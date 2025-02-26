<?php
require "actions/database.php";
//Verifier si l'id de la question est bien rentrer dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

    //Recuperer l'id de la question
    $idOfQuestion = $_GET['id'];

    //Verifier si la question existe 
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id=?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){
        //Recuperer toutes les donnees de la questions dans un tableau
        $questionssInfos = $checkIfQuestionExists->fetch();

        //stocker les datas de la question dans des variables propres
        $question_title = $questionssInfos['titre'];
        $question_content = $questionssInfos['contenu'];
        $question_id_author = $questionssInfos['id_auteur'];
        $question_pseudo_author = $questionssInfos['pseudo_auteur'];
        $question_date = $questionssInfos['date_publication'];


    }
    else{
        $erreurMsg = "Aucune question n'a ete trouver";
    }
}
else{
    $erreurMsg = "Aucune question n'a ete trouver";
}

?>