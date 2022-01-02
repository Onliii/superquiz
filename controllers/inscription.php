<?php
function inscription(){
    try{
        session_destroy();
        require "views/inscriptionView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}