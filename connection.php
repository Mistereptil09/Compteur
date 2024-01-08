<!DOCTYPE html>
<html lang="fr">
<head>    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecter</title>
</head>
<body>
    <?php include("header.php") ?>
    <div>
        <h1>Connection</h1>
        <?php
        // Vérifier si le paramètre d'erreur est présent dans l'URL
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<p id='error'>Ce nom d'utilisateur n'existe pas.</p>";
        }
        else if (isset($_GET['error']) && $_GET['error'] == 2){
            echo "<p id='error'>Le mot de passe est erronné.</p>";
        }
        ?>
        <form action="login.php" method="post">
            <div>
                <label for="pseudo">Entrez votre pseudo :</label>
                <input type="text" name="pseudo" required>
            </div>
            <div>
                <label for="password">Entrez votre mot de passe :</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="Se connecter" class="roundedButton">
        </form>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>