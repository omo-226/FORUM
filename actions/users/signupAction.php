<?php
session_start(); 
require "actions/database.php";

//Validation du formulaire
if(isset($_POST["validate"])){

    // les donnee de l'utilisateur
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $nom = htmlspecialchars($_POST["lastname"]);
    $prenom = htmlspecialchars($_POST["firstname"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // verifier si aucun des champ du  formulaire est vide
    if (!empty($pseudo) && !empty($nom) && !empty($prenom)) {

        //verifier si l'utilisateur existe deja sur le site
        $checkIfUserAlreadyExists = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
        $checkIfUserAlreadyExists->execute(array($pseudo));

        // si une donnee a ete recuperer?
        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            // inserer l'utilisateur dans la bdd
            $inserUserOnWesite = $bdd->prepare("INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?, ?, ?, ?)");
            $inserUserOnWesite->execute(array($pseudo, $nom, $prenom, $password));

            // pour authentifier l'utilisteur il faut recuperer les donnees de l'utilisateur dans un tableau
            $getInfosOfThisUserReq= $bdd->prepare("SELECT id, pseudo, nom, prenom FROM users WHERE pseudo=? AND nom=? AND prenom=?");
            $getInfosOfThisUserReq->execute(array($pseudo, $nom, $prenom)) ;
            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentification
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $usersInfos["id"];
            $_SESSION["lastname"] = $usersInfos["nom"];
            $_SESSION["firstname"] = $usersInfos["prenom"];
            $_SESSION["pseudo"] = $usersInfos["pseudo"];

            //s'il est authentifie rediriger le sur index.php
            header("Location: index.php");


        }else{
            $erreurMsg = "L'utilisateur existe deja";
        }
    }
    else{
        $erreurMsg = "veillez completer tous les champs...";
    }
}

?>