<?php
include("Bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data from the form
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    // SQL request to check if the username already exists
    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = $bdd->query($sql);

    // Check if the username already exists
    if ($result->rowCount() == 0) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL request to insert the new user
        $insertSql = "INSERT INTO users (name, password) VALUES ('$username', '$hashedPassword')";
        $bdd->query($insertSql);

        // Get the user ID of the newly inserted user
        $userId = $bdd->lastInsertId();

        // Start the session
        session_start();
        
        // Store user information in session
        $_SESSION['user_id'] = $userId;

        // Redirect to a secure page after successful creation
        header("Location: accueil.php");
        exit();
    } else {
        // Username already exists, redirect to the connection page with an error message
        header("Location: inscription.php?error=1");
        exit();
    }
}

// Close connection
$bdd = null;
?>
