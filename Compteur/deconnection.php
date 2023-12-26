<?php
// Démarrez la session (assurez-vous que cela est fait au début de chaque page utilisant la session)
session_start();

// Détruisez toutes les données de session
session_destroy();

// Supprimez également le contenu de la variable de session
$_SESSION = array();

// Redirigez l'utilisateur vers la page de connexion ou une autre page après la déconnexion
header("Location: index.php");
exit();
?>
