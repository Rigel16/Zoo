<?php
require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $commentaire = $_POST["commentaire"];
    
    // Requête SQL pour insérer l'avis dans la base de données
    $sql = "INSERT INTO avis (pseudo, commentaire, etat) VALUES (:pseudo, :commentaire, 'en_attente')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':commentaire', $commentaire);
    
    try {
        // Exécuter la requête d'insertion
        $stmt->execute();
        echo "Votre avis a été soumis avec succès et est en attente de validation.";
    } catch(PDOException $e) {
        echo "Erreur lors de la soumission de l'avis : " . $e->getMessage();
    }
}
?>