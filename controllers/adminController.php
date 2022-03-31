<?php
require_once ('models/playerModel.php');
require_once ('models/quizModel.php');
function adminpanel(){
    try{
        unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        if ($_SESSION['log']==false||$_SESSION['admin']==0){
            header('Location: index.php');
        }
        $players=Player::getAllUsers();
        $questions=Quiz::getAllQuestions();

        require "views/adminPanelView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}
//====================CRUD Players============================

function delPlayer(){
    $playerId=$_GET['iddel'];
    Player::deletePlayer($playerId);
}
function getActivePlayer(){
    $playerId=$_GET['idact'];
    Player::undeletePlayer($playerId);
}
function editplayerAffichage(){
    try{
        unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        if ($_SESSION['log']==false||$_SESSION['admin']==0){
            header('Location: index.php');
        }
        $playerId=$_GET['id'];
        $result=Player::getAllUserById($playerId);
        editPlayer();
        require "views/editPlayerView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}
function editPlayer(){
    if (!empty($_POST['name']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['nicknameUS'])){
        if (strlen($_POST['name'])<=50 && strlen($_POST['fname'])<=50 && strlen($_POST['email'])<=50 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){


            $playerId=$_GET['id'];
            $result=Player::getAllUserById($playerId);
            $check=Player::getExistUser($_POST['nicknameUS']);
            if ($check==0||$_POST['nicknameUS']==$result['nickname_us']){
                Player::updatePlayer($playerId,$_POST['name'],$_POST['fname'],$_POST['nicknameUS'],$_POST['email'],$_POST['role']);
                header('Location: index.php?page=adminpanel');
            }
        }
    }
}

//====================================CRUD Questions=====================================

function deleteQuestion(){
    $quest=$_GET['quesdel'];
    Quiz::deleteQuestion($quest);
}

function editQuestionAffichage()
{
    try {
        unset($_SESSION["nq"], $_SESSION["tab_tir"], $_SESSION["score"], $_SESSION["ok"]);
        if ($_SESSION['log'] == false||$_SESSION['admin']==0) {
            header('Location: index.php');
        }
        $quest=$_GET['quest'];
        $result=Quiz::getQuestion($quest);
        editQuest();
        require "views/editQuestionView.php";
    } catch (PDOException $e) {
        $msgError = 'Page introuvable' . $e->getMessage();
        require "views/errorView.php";
    }
}
function addQuestionAffichage()
{
    try {
        unset($_SESSION["nq"], $_SESSION["tab_tir"], $_SESSION["score"], $_SESSION["ok"]);
        if ($_SESSION['log'] == false&&$_SESSION['admin']==0) {
            header('Location: index.php');
        }
        addQuest();
        require "views/addQuestionView.php";
    } catch (PDOException $e) {
        $msgError = 'Page introuvable' . $e->getMessage();
        require "views/errorView.php";
    }
}
function addQuest(){
    if (!empty($_POST['question'])&&!empty($_POST['r1'])&&!empty($_POST['r2'])&&!empty($_POST['r3'])&&!empty($_POST['r4'])&&!empty($_POST['repQ'])){
        if (strlen($_POST['question'])<=150 && strlen($_POST['r1'])<=150 && strlen($_POST['r2'])<=150 && strlen($_POST['r3'])<=150 && strlen($_POST['r4'])<=150){
            Quiz::addQuestion($_POST['question'],$_POST['r1'],$_POST['r2'],$_POST['r3'],$_POST['r4'],$_POST['repQ']);
            header('Location: index.php?page=adminpanel');
        }
    }
}
function editQuest(){
    if (!empty($_POST['question'])&&!empty($_POST['r1'])&&!empty($_POST['r2'])&&!empty($_POST['r3'])&&!empty($_POST['r4'])&&!empty($_POST['repQ'])){
        if (strlen($_POST['question'])<=150 && strlen($_POST['r1'])<=150 && strlen($_POST['r2'])<=150 && strlen($_POST['r3'])<=150 && strlen($_POST['r4'])<=150){
            Quiz::editQuestion($_GET['quest'],$_POST['question'],$_POST['r1'],$_POST['r2'],$_POST['r3'],$_POST['r4'],$_POST['repQ']);
            header('Location: index.php?page=adminpanel');
        }
    }
}