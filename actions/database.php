<?php
try {
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}



?>