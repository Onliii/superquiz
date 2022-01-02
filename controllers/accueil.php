<?php
require_once('models/playerModel.php');
function acceuil(){
    try{
        connexion();
        require "views/accueilView.php";

    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}
function connexion(){
    if (!empty($_POST['login']) && !empty($_POST['pwd']))
    {
        $row = Player::getExistUser($_POST['login']);
        if ($row == 1)
        {

            $data = Player::getUser($_POST['login']);

            if ($_POST['pwd']==$data['password_us'])
            {
                $_SESSION['log'] = true;
                $_SESSION['name'] = $data['name_us'];
                $_SESSION['nickname'] = $data['nickname_us'];
                $_SESSION['fname'] = $data['firstname_us'];
                $_SESSION['admin'] = $data['admin_us'];
                $_SESSION['id'] = $data['id_users'];
                if ($_SESSION['admin']==0){
                    $_SESSION['role']='Joueur';
                }else {
                    $_SESSION['role']='Administrateur';
                }
                header('Location: index.php?page=home');
            }
        }
    }
}