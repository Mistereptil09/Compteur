<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Compteur</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("Bdd.php");
    // Check if the user is logged in
    session_start();
    if (isset($_SESSION['user_id'])) {
        // If it exists, assign the value to $userId
        $userId = $_SESSION['user_id'];
    } else {
        // Otherwise, assign null to $userId
        $userId = null;
    }

    if ($userId) {
        $numbers = $bdd->query("SELECT description, date, idnumber FROM numbers join users on iduser_user=iduser WHERE iduser = $userId");
    }
    ?>
</head>
<body>
    <?php include("header.php") ?>
<div>
        <?php 
        if (isset($_GET['success']) && $_GET['success'] == 1) {?>
            <div><p> </p>
            <?php echo "<p id='succes'>Entré supprimée avec succès</p>";?>
            </div>
        <?php }
        else if (isset($_GET['error']) && $_GET['error'] == 1) {?>
            <div><p> </p>
            <?php echo "<p id='error'>Erreur dans la suppression</p>";?>
            </div>
        <?php }
        if ($numbers->rowCount() == 0) { ?>
            <h1 id="noEntries">Pas d'entrées de votre part, n'hésitez pas à participer !</h1>
            <?php }
            else { ?>
                <table>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Supprimer</th>
                </tr>
                <?php foreach($numbers as $number){ ?>
                    <tr>
                    <td><?php echo $number['date']?></td>
                    <td><?php echo $number['description']?></t>
                    <td><a href="delete?delete=<?php echo $number['idnumber']?>"><button class=roundedButton>supprimer</button></td></a>
                    </tr>
                <?php }
            } ?>
    </table>
</div>
    <?php include("footer.php"); ?>
</body>
</html>
