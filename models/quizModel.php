<?php

class Quiz
{
    public static function getQuestion($idQuest)
    {
        require('private/db.php');

        $req = $db->prepare("SELECT * FROM quiz WHERE num_quest = $idQuest");
        $req->execute();
        $resultat = $req->fetch();

        return $resultat;
    }

    public static function getAllQuestions(){
        require('private/db.php');
        $req = $db->prepare("SELECT * FROM quiz");
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public static function deleteQuestion($quest){
        require('private/db.php');
        $req = $db->prepare("DELETE FROM quiz WHERE num_quest='$quest'");
        $req->execute();
    }

    public static function addQuestion($quest,$r1,$r2,$r3,$r4,$repQ){
        require('private/db.php');
        $req = $db->prepare("INSERT INTO quiz (question,r1,r2,r3,r4,reponse) VALUES (:question,:r1,:r2,:r3,:r4,:reponse)");
        $req->execute(array(
            'question'=>$quest,
            'r1'=>$r1,
            'r2'=>$r2,
            'r3'=>$r3,
            'r4'=>$r4,
            'reponse'=>$repQ
        ));
    }
    public static function editQuestion($idQuest,$question,$r1,$r2,$r3,$r4,$repQ){
        require('private/db.php');
        $req =  $db->prepare("UPDATE quiz SET question=`$question`,r1=`$r1`,r2='$r2',r3='$r3',r4='$r4',reponse=$repQ WHERE num_quest= $idQuest");
        $req->execute();
    }

    public static function getExistIdQuest($idQuest){
        require('private/db.php');
        $req = $db->prepare("SELECT num_quest FROM quiz WHERE num_quest=$idQuest");
        $req->execute();
        $result = $req->rowCount();
        return $result;
    }

    public static function getHighestId(){
        require('private/db.php');
        $req = $db->prepare("SELECT MAX(num_quest) FROM quiz");
        $req->execute();
        $resultat = $req->fetch();
        return $resultat[0];
    }

}
