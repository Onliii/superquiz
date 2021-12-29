<?php

function acceuil(){
    try{
        require "views/accueilView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}