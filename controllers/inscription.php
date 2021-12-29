<?php
function inscription(){
    try{
        require "views/inscriptionView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}