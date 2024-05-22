<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="espace.css">
    <title>Espace Employé</title>
</head>
<body>
    <h2>Espace Employé - Gestion des Avis</h2>
    <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Commentaire</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données
            
            // Requête SQL pour sélectionner tous les avis en attente de validation
            $sql = "SELECT * FROM avis WHERE etat = 'en_attente'";
            $result = $conn->query($sql);
            
            // Afficher les avis en attente sous forme de lignes de tableau
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['pseudo']}</td>";
                echo "<td>{$row['commentaire']}</td>";
                echo "<td>";
                // Bouton pour valider l'avis
                echo "<form action='valider_avis.php' method='post'>";
                echo "<input type='hidden' name='avis_id' value='{$row['avis_id']}'>";
                echo "<button type='submit' name='valider'>Valider</button>";
                echo "</form>";
                // Bouton pour annuler l'avis
                echo "<form action='annuler_avis.php' method='post'>";
                echo "<input type='hidden' name='avis_id' value='{$row['avis_id']}'>";
                echo "<button type='submit' name='annuler'>Annuler</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.html"><button>Revenir a l'accueil</button></a>

</body>
</html>