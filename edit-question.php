<?php 
    require 'actions/questions/editQuestionAction.php' ; 
    require 'actions/users/securityAction.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br><br>

    <div class="container">
        
        <?php if(isset($erreurMsg)){ 
                    echo "<p>".$erreurMsg."</p>"; 
                }
        ?>

        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
        </form>

    </div>
    
</body>
</html>