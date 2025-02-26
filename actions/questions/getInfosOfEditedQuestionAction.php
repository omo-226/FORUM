<?php require 'actions/database.php';

// verifier si l'id de la question est bien passe en parametre dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    // Si au moins une question a ete trouver ?
    if ($checkIfQuestionExists->rowCount() > 0) {

        //recuperer les donnees de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']) {

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
            $question_date = $questionInfos['date_publication'];
        }
        else{
            $erreurMsg = 'Vous n"etes pas l"auteur de cette question';
        }
    }
    else{
        $erreurMsg = 'aucune question n"a ete trouver';
    }
}
else{
    $erreurMsg = 'aucune question n"a ete trouver';
}

?>