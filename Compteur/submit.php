<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the connection page
    header("Location: connection.php");
    exit();
}

// Include database connection
include("Bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data from the form
    $description = $_POST['description'];

    // Get the user ID from the session
    $userId = $_SESSION['user_id'];

    // SQL request to insert data into the 'numbers' table
    $insertSql = "INSERT INTO numbers (date, description, iduser_user) VALUES (NOW(), '$description', '$userId')";
    $bdd->query($insertSql);

    // Redirect to a page after successful insertion
    header("Location: accueil.php");
    exit();
}

// Close connection
$bdd = null;
?>
 <!-- #region-->