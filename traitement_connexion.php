
<?php
require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
 
    // Requête SQL pour récupérer l'utilisateur correspondant aux informations de connexion
    $sql = "SELECT * FROM utilisateur WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // L'utilisateur est connecté, redirigez-le vers la page appropriée en fonction de son rôle
        switch ($user['role_id']) {
            case 1: // Administrateur
                header('Location: index.html');
                break;
            case 2: // Vétérinaire
                header('Location: rpt.php');
                break;
            case 3: // Employé
                header('Location: espace_employe.php');
                break;
            default: // Cas par défaut
                echo "Rôle non défini pour cet utilisateur.";
        }
    } else {
        // Les informations de connexion sont incorrectes, affichez un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>