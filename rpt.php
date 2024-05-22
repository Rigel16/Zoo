<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre un Rapport de Vétérinaire</title>
    <link rel="stylesheet" href="rpt.css"> <!-- Inclure le fichier CSS -->
</head>
<body>
    <div class="container">
        <h2>Soumettre un Rapport de Vétérinaire</h2>
        <form action="traitement_rpt.php" method="post">
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="details">Détails :</label>
                <textarea name="details" id="details" required></textarea>
            </div>
            <div class="form-group">
                <label for="etat">État :</label>
                <input type="text" name="etat" id="etat" required>
            </div>
            <div class="form-group">
                <label for="usernameVeterinaire">Nom d'utilisateur du vétérinaire :</label>
                <input type="text" name="usernameVeterinaire" id="usernameVeterinaire" required>
            </div>
            <div class="form-group">
                <label for="animal_id">Animal :</label>
                <select name="animal_id" id="animal_id" required>
                    <option value="">Sélectionner un animal</option>
                    <?php
                    require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

                    // Requête SQL pour sélectionner tous les animaux
                    $sql = "SELECT id_animaux, prenom FROM animaux";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id_animaux']}'>{$row['prenom']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Soumettre">
            </div>
        </form>
        <a href="index.html"><button>Retour Accueil</button></a>
    </div>
</body>
</html>