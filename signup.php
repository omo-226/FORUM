<?php
require 'actions/users/signupAction.php'; 
//require 'actions/users/securityAction.php'; 
?>

<!DOCTYPE html>
<?php include "includes/head.php"; ?>
<br><br>


<body>
    <form class=" container" method="post">
        <?php if(isset($erreurMsg)){ echo "<p>".$erreurMsg."</p>"; } ?>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
    <a href="login.php"><p>j'ai deja un compte, je veux me connecter</p></a>
    </form>
</body>
</html>