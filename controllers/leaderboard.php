<?php
require_once ('models/historyModel.php');
require_once ('models/playerModel.php');
function leaderboard(){
    try{
        unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        if ($_SESSION['log']==false){

            header('Location: index.php');
        }

        $result=History::getAllHistoryOrder();
        $cpt=0;
        foreach ($result as $row){
            $nick=$row['id_user_hi'];
            $tab_name[$cpt] = Player::getUserById($nick);
            $tab_score[$cpt] = $row['max(score_hi)'];
            $tab_date[$cpt] = $row['date'];
            $tab_attemps[$cpt] = $row['count(id_user_hi)'];
            $cpt++;
        }

        require "views/leaderboardView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}