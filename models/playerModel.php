<?php
class Player
{
    public static function getUser($userb)
    {
        require('private/db.php');
        $req = $db->prepare("SELECT * FROM user WHERE nickname_us = '$userb'");
        $req->execute();

        return ($req->fetch());
    }
    public static function getUserById($idUs)
    {
        require('private/db.php');
        $req = $db->prepare("SELECT nickname_us FROM user WHERE id_user = '$idUs'");
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }
    public static function getAllUserById($idUs)
    {
        require('private/db.php');
        $req = $db->prepare("SELECT * FROM user WHERE id_user = '$idUs'");
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
    public static function getExistUser($userb)
    {
        require('private/db.php');
        $req = $db->prepare("SELECT nickname_us FROM user WHERE nickname_us = '$userb'");
        $req->execute();
        $row=$req->rowCount();
        return $row;
    }

    public static function createUser($name,$fname,$nickname,$email,$password){
        require('private/db.php');
        $req= $db->prepare("INSERT INTO user (name_us,fname_us,nickname_us,email_us,password_us) VALUES (:name_us,:fname_us,:nickname_us,:email_us,:password_us)");
        $req->execute(array(
           'name_us'=>$name,
           'fname_us'=>$fname,
           'nickname_us'=>$nickname,
           'email_us'=>$email,
           'password_us'=>$password,
        ));
    }
    public static function getIdUser ($userb){
        require('private/db.php');
        $req = $db->prepare("SELECT id_user FROM user WHERE nickname_us = '$userb'");
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }
    public static function getAllUsers(){
        require('private/db.php');
        $req = $db->prepare("SELECT * FROM user");
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
    public static function deletePlayer($id)
    {
        require('private/db.php');
        $req =  $db->prepare("UPDATE user SET active_us=0 WHERE id_user= $id");
        $req->execute();
    }
    public static function undeletePlayer($id)
    {
        require('private/db.php');
        $req =  $db->prepare("UPDATE user SET active_us=1 WHERE id_user= $id");
        $req->execute();
    }
    public static function updatePlayer($id,$name,$fname,$nick,$email,$admin){
        require('private/db.php');
        $req =  $db->prepare("UPDATE user SET name_us='$name',fname_us='$fname',nickname_us='$nick',email_us='$email',admin_us=$admin WHERE id_user= $id");
        $req->execute();
    }
}