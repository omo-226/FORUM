<?php
require "actions/database.php";

//Validation du formulaire
if(isset($_POST["validate"])){

    // les donnee de l'utilisateur
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $password = htmlspecialchars($_POST["password"]);

    // verifier si aucun des champ du  formulaire est vide
    if(!empty($pseudo) && !empty($password)){

        // verifier si le pseudo existe et correct
        $chekIfUserExists = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
        $chekIfUserExists->execute(array($pseudo));

        // tester s'il ya des donnees a recuper
        if($chekIfUserExists->rowCount() > 0){

            // recuperer les donnees de l'utilisateur dans un tableau
            $usersInfos = $chekIfUserExists->fetch();

            // recuperer le mot de passe correspond a celui de la bdd(mot de pass correct)
            if(password_verify($password, $usersInfos["mdp"])){
                
                //Authentification
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $usersInfos["id"];
                $_SESSION["lastname"] = $usersInfos["nom"];
                $_SESSION["firstname"] = $usersInfos["prenom"];
                $_SESSION["pseudo"] = $usersInfos["pseudo"];

                // rediriger l'utilisateur sur la page index.php
                header("Location: index.php");
            }
            else{
                $erreurMsg = "votre mode passe est incorrect...";
            }
        }
        else{
            $erreurMsg = "Ce Pseudo n'existe pas...";
        }
    }
    else{
        $erreurMsg = "veillez completer tous les champs...";
    }
    
}
?>