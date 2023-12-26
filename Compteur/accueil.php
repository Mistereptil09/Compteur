<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("Bdd.php");

    // Query to get the total number of messages
    $result = $bdd->query("SELECT COUNT(idnumber) AS total_messages FROM numbers")->fetch();
    $totalMessages = $result['total_messages'];

    // Check if the user is logged in
    session_start();
    if (isset($_SESSION['user_id'])) {
        // If it exists, assign the value to $userId
        $userId = $_SESSION['user_id'];
    } else {
        // Otherwise, assign null to $userId
        $userId = null;
    }

    // If the user is logged in, retrieve their name
    if ($userId) {
        $nameResult = $bdd->query("SELECT name FROM users WHERE iduser = $userId");
        $userData = $nameResult->fetch();
        $userName = $userData['name'];
    }
    ?>
</head>
<body>
    <?php include("header.php") ?>
    <div>
        <?php
        // Display the user's name if they are logged in
        if ($userId) {
            echo "<p id='username'>Logged in as: $userName</p>";
        }
        ?>
    </div>
    <div id="counting">
        <?php
        // Display the total number of messages
        echo "<p id='showNumber'>Number of 'Antonio !' :</br> $totalMessages</p>";
        ?>
        <form action="submit.php" method="post">
            <div>
                <label for="description">Moment Description:</label>
                <input type="text" name="description" required>
            </div>
            <input type="submit" value="Enter the Moment!" class="roundedButton">
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
