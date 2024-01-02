<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Compteur</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("Bdd.php");
    // Query
    $result = $bdd->query("SELECT COUNT(idnumber) AS total_messages FROM numbers")->fetch();
    $totalMessages = $result['total_messages'];  
    ?>
</head>
<body>
    <?php include("header.php") ?>
<div id="counting">
    <?php
    // Display of the querry
    echo "<p id='showNumber'>Nombre de 'Antonio !' :</br> $totalMessages</p>";
    ?>
</div>
    <?php include("footer.php"); ?>
</body>
</html>
