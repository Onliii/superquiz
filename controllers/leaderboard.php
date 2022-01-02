<?php
function leaderboard(){
    try{
        unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        if ($_SESSION['log']==false){
            header('Location: index.php');
        }
        require "views/leaderboardView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}