<?php 
//require "actions/users/securityAction.php"; 
session_start();
require 'actions/questions/showAllQuestionsAction.php'
?>

<?php include "includes/head.php";?>

<!DOCTYPE html>
<html lang="fr">
<body>
    <?php include "includes/navbar.php";?> 
    <br><br>

    <div class="container">


        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">RECHERCHER</button>
                </div>

            </div>
        </form>

        <br> <br>

        <?php
            while($question = $getAllMyQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?= $question['id'];?>">
                            <?= $question["titre"];?>
                        </a>
                    </div>
                    <div class="card-body">
                        <?= $question["description"];?>
                    </div>
                    <div class="card-footer">
                         Publier par <a href="profile.php?id=<?= $question['id_auteur'];?>"><?= $question["pseudo_auteur"];?></a> le  <?= $question["date_publication"];?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>

    </div>
</body>
</html>