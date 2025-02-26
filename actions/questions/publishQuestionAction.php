<?php
require "actions/database.php";

if (isset($_POST["validate"])) {
    
    

    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
        $question_title = htmlspecialchars($_POST["title"]);
        $question_description = htmlspecialchars($_POST["description"]);
        $question_content = htmlspecialchars($_POST["content"]);
        $question_date = date("d/m/Y");
        $question_id_author = $_SESSION["id"];
        $question_pseudo_author = $_SESSION["pseudo"];
        
        $insertQuestionOnWebSite = $bdd->prepare("INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?, ?)");
        $insertQuestionOnWebSite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content, 
                $question_id_author, 
                $question_pseudo_author, 
                $question_date
            )
        );

        $succesMsg = "votre question a bien ete publiee sur le sites";


    }
    else{
        $erreurMsg="veillez completez tous les champs";
    }
}


?>