<?php
// Inclusion de la connexion à la base de données
require_once 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $animal = $_POST['animal'];
    $status = $_POST['status'];
    $food = $_POST['food'];
    $grams = $_POST['grams'];
    $date = $_POST['date'];
    $detail = $_POST['detail'];
    $username = "kibaakamaru@gmail.com"; // Nom d'utilisateur du vétérinaire (à remplacer par un système d'authentification approprié)

    // Requête SQL pour insérer les données dans la table rapport_veterinaire
    $sql = "INSERT INTO rapport_veterinaire (date, detail, etatAvis, username, animal_id) VALUES (:date, :detail, :etatAvis, :username, :animal_id)";

    // Préparer la requête pour l'exécution
    $stmt = $conn->prepare($sql);

    // Liaison des valeurs et exécution de la requête
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':detail', $detail);
    $stmt->bindParam(':etatAvis', $status);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':animal_id', $animal);
    
    // Exécution de la requête
    try {
        $stmt->execute();
        echo "Rapport vétérinaire enregistré avec succès.";
    } catch(PDOException $e) {
        echo "Erreur d'enregistrement du rapport vétérinaire : " . $e->getMessage();
    }
}
?>
