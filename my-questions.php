<?php
    require 'actions/users/securityAction.php'; 
    require 'actions/questions/myQuestionsActions.php';
    

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">

    <br> <br>
    
        <?php 

            while($question = $getAllMyQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header">
                            <a href="article.php?id=<?= $question['id'];?>">
                                <?= $question["titre"];?>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text"> <?= $question['description']; ?>  </p>
                        <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder a la question</a>
                        <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">modifier la question</a>
                        <a href="actions/questions/deleteQuestionction.php?id=<?=$question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                    </div>
                </div>
                <br>
                <?php
            }
        
        
        
        ?>
    </div>
</body>
</html>