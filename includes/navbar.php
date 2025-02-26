<nav class="navbar navbar-expand-lg navbar-dark bg-dark" px>
  <a class="navbar-brand" href="#">FORUM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publish-Question.php">Publier question</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my-questions.php">Mes Questions</a>
      </li>
      <?php
        if(isset($_SESSION['auth'])){
          ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Deconnexion</a>
            </li>

          <?php
        }
      ?>
      
    </ul>
  </div>
</nav>