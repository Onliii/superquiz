<?php
function inscription(){
    try{
        session_destroy();
        signin();
        require "views/inscriptionView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}

function signin(){

    if (!empty($_POST['name']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['pwd']) && !empty($_POST['confPwd'])){
        if (strlen($_POST['name'])<=50 && strlen($_POST['fname'])<=50 && strlen($_POST['email'])<=50 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            $row=Player::getExistUser($_POST['login']);
            if ($row==0 && $_POST['pwd']==$_POST['confPwd']){
               $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

                Player::createUser($_POST['name'],$_POST['fname'],$_POST['login'],$_POST['email'],$pwd);

                session_start();
                $_SESSION['log'] = true;
                $_SESSION['name'] = $_POST['name'];
                $_SESSION['nickname'] = $_POST['login'];
                $_SESSION['fname'] = $_POST['fname'];
                $_SESSION['admin'] = 0;
                $_SESSION['role']='Joueur';
                $_SESSION['id']=Player::getIdUser($_SESSION['nickname']);
               header('Location: index.php?page=home');
            }
        }
    }

}