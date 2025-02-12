<?php
    require 'actions/questions/myQuestionsActions.php';
    require 'actions/users/securityAction.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">

    <br> <br>
    
        <?php 

            while($questions = $getAllMyQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header"> <?= $questions['titre']; ?>  </h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text"> <?= $questions['description']; ?>  </p>
                        <a href="#" class="btn btn-primary">Acceder a la question</a>
                        <a href="#" class="btn btn-warning">modifier la question</a>
                    </div>
                </div>
                <br>
                <?php
            }
        
        
        
        ?>
    </div>
</body>
</html>