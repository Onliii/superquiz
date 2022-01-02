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
    public static function getExistUser($userb)
    {
        require('private/db.php');
        $req = $db->prepare("SELECT nickname_us FROM user WHERE nickname_us = '$userb'");
        $req->execute();
        $row=$req->rowCount();
        return $row;
    }
}