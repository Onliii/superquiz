<?php
function home(){
    try{
        unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        require "views/homeView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}