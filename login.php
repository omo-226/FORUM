<?php 
//require 'actions/users/securityAction.php'; 
require "actions/users/loginAction.php"; 
//require 'actions/users/securityAction.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>
<body>
    <form class=" container mt-4" method="post">
        <?php if(isset($erreurMsg)){ echo "<p>".$erreurMsg."</p>"; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
    
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <a href="signup.php"><p>je n'ai pas de compte, je m'inscris</p></a>
    </form>
</body>
</html>