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
        $numbers = $bdd->query("SELECT description, date FROM numbers join users on iduser_user=iduser WHERE iduser = $userId");
    }
    ?>
</head>
<body>
    <?php include("header.php") ?>
<div>

        <?php
        // If the user is logged in, retrieve their name
        if ($numbers->rowCount() == 0) { ?>
            <h1 id="noEntries">Pas d'entrées de votre part, n'hésitez pas à participer !</h1>
            <?php }
            else { ?>
                <table>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                </tr>
                <?php foreach($numbers as $number){ ?>
                    <tr>
                    <td><?php echo $number['date']?></td>
                    <td><?php echo $number['description']?></td>
                    </tr>
                <?php }
            } ?>
    </table>
</div>
    <?php include("footer.php"); ?>
</body>
</html>
