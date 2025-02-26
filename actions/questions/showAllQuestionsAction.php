<?php

require "actions/database.php";
//Recuperer les questions par defaut sans recherche
$getAllMyQuestions = $bdd->query("SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5");

//Verifier si une recherch a ete rentrer par l'user
if(isset($_GET['search']) && !empty($_GET['search'])){
   
    //la recherche
    $usersSearch = $_GET['search'];

    //Recuperer toute les questions qui correspondent a la recherche  en fonction du titre
    $getAllMyQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch. '%" ORDER BY id DESC');
    $getAllMyQuestions->execute(array($userSearch));
}

