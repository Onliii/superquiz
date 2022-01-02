<?php
session_set_cookie_params(600);
session_start();
//Redirige via des $get vers les pages voulues

require ('controllers/accueil.php');
require ('controllers/inscription.php');
require ('controllers/home.php');
require ('controllers/quiz.php');
require ('controllers/leaderboard.php');
require ('controllers/function.php');

if (isset($_GET['page'])){
    if ($_GET['page']=='inscription'){
        inscription();
    }
    if ($_GET['page']=='home'){
        home();
    }
    if ($_GET['page']=='quiz'){
        quizPage();
    }
    if ($_GET['page']=='leaderboard'){
        leaderboard();
    }
    if ($_GET['page']=='logout'){
        logout();
    }
}
else {
    if (isset($_GET['rep']))
    {
        header('Location: index.php?page=quiz&rep=' . $_GET['rep']);
    }
    else{
        acceuil();
    }
}