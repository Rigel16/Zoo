<?php
require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $details = $_POST["details"];
    $etat = $_POST["etat"];
    $usernameVeterinaire = $_POST["usernameVeterinaire"];
    $animal_id = $_POST["animal_id"];

    // Requête SQL pour insérer le rapport dans la base de données
    $sql = "INSERT INTO rapport_veterinaire (date, detail, etatAvis, username, id_animaux) 
            VALUES (:date, :details, :etat, :usernameVeterinaire, :animal_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':usernameVeterinaire', $usernameVeterinaire);
    $stmt->bindParam(':animal_id', $animal_id);

    try {
        // Exécuter la requête d'insertion
        $stmt->execute();
        echo "Le rapport a été soumis avec succès.";
    } catch(PDOException $e) {
        echo "Erreur lors de la soumission du rapport : " . $e->getMessage();
    }
}
?>