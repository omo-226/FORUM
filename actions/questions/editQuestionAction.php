<?php require 'actions/database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    // Si au moins une question a ete trouver ?
    if ($checkIfQuestionExists->rowCount() > 0) {

        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']) {
            $question_title = $questionInfos['description'];
            $question_content = $questionInfos['content'];
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