<?php
// to test if the session is aleready running
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="case">
    <div id="logoContainer">
        <img src="images/logo.png" id="logo" alt="logo">
        <nav>
            <ul class="flex">
                <li><a href="index.php"><button class="roundedButton">Accueil</button></a></li>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) { ?>
                    <li><a href="accueil.php"><button class="roundedButton">Ajouter un moment</button></a></li>
                    <li><a href="historic.php"><button class="roundedButton">Voir l'historique</button></a></li>
                    <li><a href="deconnection.php"><button class="roundedButton">Déconnexion</button></a></li>
                <?php }
                else { ?>
                    <li><a href="connection.php"><button class="roundedButton">Se connecter</button></a></li>
                    <li><a href="inscription.php"><button class="roundedButton">S'inscrire</button></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
