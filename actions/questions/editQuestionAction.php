<?php 
require 'actions/database.php' ;
// validation du formulaire
if (isset($_POST['validate'])) {

    $new_question_title = htmlspecialchars($_POST['title']);
    $new_question_description = htmlspecialchars($_POST['description']);
    $new_question_content = htmlspecialchars($_POST['content']);

    // verifier si tous les champs sont remplisc
    if(!empty($new_question_title) && !empty($new_question_description) && !empty($new_question_content)){

        //modifier les informations de la question qui possede l'id rentrer en parametre
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array( $new_question_title, $new_question_description, $new_question_content, $idOfQuestion) );

        //redirection vers la page d'affichage
        header('Location: my-questions.php');
    }
    else{
        $erreurMsg = 'Veillez completez les champs....';
    }


    

}