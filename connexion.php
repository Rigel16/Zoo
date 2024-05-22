<?php
// Informations de connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = "root"; // Mot de passe MySQL
$database = "zoo"; // Nom de la base de données MySQL

try {
    // Créer une connexion PDO à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Configurer PDO pour qu'il génère des exceptions en cas d'erreur SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}
?>