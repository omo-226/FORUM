<?php

require 'actions/database.php';

//Recuperer l'identifier de l'utilisteur
if(isset($_GET['id']) && !empty($_GET['id'])){
    $idOfUser = $_GET['id'];

    //verifier si l'utilisateur existe
    $checkIfUserExits = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ? ORDER BY id DESC');
    $checkIfUserExits->execute(array($idOfUser));

    if($checkIfUserExits->rowCount() > 0){

        //Recuperer toutes les datas  
        $usersInfos = $checkIfUserExits->fetch();
        
        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];

        //Recuperer toutes les questions publiees par l'user
        $getHisQuestion = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ?');
        $getHisQuestion->execute(array($idOfUser));
    }
    else{
        $erreurMsg = "Aucun utilisateur trouver ";
    }
}
else{
    $erreurMsg = "Aucun utilisateur trouver ";
}