<?php
include("Bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data from the form
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    // SQL request to check if the username exists
    $sql = "SELECT * FROM users WHERE name='$username'";
    $result = $bdd->query($sql);

    // Check if the username exists
    if ($result->rowCount() > 0) {
        // Fetch the user data
        $user = $result->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, store user information in session
            session_start();
            $_SESSION['user_id'] = $user['iduser'];

            // Redirect to a secure page
            header("Location: accueil.php");
            exit();
        } else {
            // Password is incorrect, redirect to the connection page with an error message
            header("Location: connection.php?error=2");
            exit();
        }
    } else {
        // Username doesn't exist, redirect to the connection page with an error message
        header("Location: connection.php?error=1");
        exit();
    }
}

// Close connection
$bdd = null;
?>
