<?php
try {
    
    $bdd = new PDO("mysql:host=mysql-bigforum.alwaysdata.net;dbname=bigforum_bd;charset=utf8", "bigforum", "Bypass2022");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}



?>