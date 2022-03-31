<?php
class History{

    public static function getAllHistoryOrder(){
        require ('private/db.php');
        $req=$db->prepare("SELECT (id_user_hi),max(score_hi), count(id_user_hi), date FROM user,history WHERE id_user=id_user_hi GROUP BY id_user_hi ORDER BY max(score_hi) DESC, count(*) ASC");
        $req->execute();
        $history=$req->fetchAll();
        return $history;
    }

    public static function insertGame($score,$id){
        require ('private/db.php');
        $req=$db->prepare("INSERT INTO history (score_hi,id_user_hi)VALUES(:score_hi,:id_user_hi)");
        $req->execute(array(
           'score_hi'=>$score,
           'id_user_hi'=>$id
        ));
    }

}