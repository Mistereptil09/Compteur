<?php
try{
    $bdd= new PDO("mysql:host=localhost;dbname=ANTONIO","root","");
}
catch(Exception $e){
    echo "probleme de connexion BDD : $e";
}
?>