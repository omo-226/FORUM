<?php 
session_start();
//require "actions/users/securityAction.php"; 
require 'actions/questions/showArticleContentAction.php';
require 'actions/questions/postAnswerAction.php';
require 'actions/questions/showAllAnswersOfQuestionAction.php';
?>



<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
    <?php include "includes/navbar.php";?> 
    <br><br>

    <div class="container">
        <?php  
            if(isset($erreurMsg)){echo $erreurMsg;}
            
            if(isset($question_date)){
                ?>
                <section class="show-content">

                    <h3><?= $question_title; ?></h3>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <small><?= '<a href="profile.php?id='.$question_id_author.'">' .$question_pseudo_author . '</a> ' . $question_date; ?></small>
                </section>
                <br>
                <section class="show-content">

                    <form action="" class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Reponse</label>
                            <textarea name="answer" class="form-control" cols="10" rows="2"></textarea>
                            <button class="btn btn-success mt-4" type="submit" name="validate">Repondre</button>
                        </div> 
                    </form>
                    <?php
                        while($answers = $getAllAnswersOfThisQuestion->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="profile.php?id=<?=$answers['id_auteur']; ?>"><?= $answers['pseudo_auteur']; ?></a>
                                </div>
                                <div class="card-body">
                                <?= $answers['contenu']; ?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>


                </section>

                <?php
            }
        

        
        ?>


        
    </div>
</body>
</html>