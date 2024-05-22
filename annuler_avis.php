<?php
require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["avis_id"])) {
    $avis_id = $_POST["avis_id"];
    
    // Requête SQL pour mettre à jour l'état de l'avis à 'annule'
    $sql = "UPDATE avis SET etat = 'annule' WHERE avis_id = :avis_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':avis_id', $avis_id);
    
    try {
        // Exécuter la requête de mise à jour
        $stmt->execute();
        header("Location: espace_employe.php"); // Rediriger vers la page principale des employés
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de l'annulation de l'avis : " . $e->getMessage();
    }
} else {
    echo "ID de l'avis non spécifié.";
}
?>