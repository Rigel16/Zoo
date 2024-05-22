<?php
// Inclure le fichier de connexion à la base de données
require_once 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    try {
        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO contact (nom, email, messages) VALUES (:nom, :email, :messages)");
        // Binder les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':messages', $message);
        // Exécuter la requête
        $stmt->execute();
        echo "Nouvel enregistrement ajouté avec succès.";
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
    }
}

// Fermer la connexion
$conn = null;
?>