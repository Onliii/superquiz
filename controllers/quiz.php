<?php
function result(){
    try{
        if ($_SESSION['log']==false){
            header('Location: index.php');
        }
        $cpt=0;
        for ($i = 1; $i<=10;$i++) {
            $question=Quiz::getQuestion($i);
            $tabQuest[$cpt]=$question['question'];
            if ($question['reponse']==1){$tabCorr[$cpt]=$question['r1'];}
            if ($question['reponse']==2){$tabCorr[$cpt]=$question['r2'];}
            if ($question['reponse']==3){$tabCorr[$cpt]=$question['r3'];}
            if ($question['reponse']==4){$tabCorr[$cpt]=$question['r4'];}
            $cpt++;
        }
        require "views/resultView.php";
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}

require_once('models/quizModel.php');
require_once('models/historyModel.php');

function quizPage(){
    try{

        if ($_SESSION['log']==false){
            header('Location: index.php');
            unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);
        }


        $nbrQuest = 10;

        if(!isset($_SESSION["nq"]))
        {
            $nq = 1;
            $score = 0;
            $tab_tir = [] ;
            $_SESSION["nq"] = $nq;
            $_SESSION["tab_tir"] = $tab_tir;
            $_SESSION["score"] = $score;

        } else { // Toutes les autres fois


            $nq = $_SESSION["nq"];
            $tab_tir = $_SESSION["tab_tir"];
            $score = $_SESSION["score"];
            $ok = $_SESSION["ok"];
            $rep = $_GET["rep"];
            if($rep == $ok)
            {
                $score++;
            }
            $nq++;
            $_SESSION["nq"]=$nq;
            $_SESSION["score"]=$score;
        }

        if($nq > $nbrQuest){

            History::insertGame($_SESSION["score"],$_SESSION["id"]);
            header('Location: index.php?page=result');
        }
        else
        {
            $tirage = TRUE;
            while($tirage)
            {
                $maxId=Quiz::getHighestId();
                $x = rand(1,$maxId);  // Générer un nombre aléatoire
                $valid=Quiz::getExistIdQuest($x);
                if (!in_array($x, $tab_tir)&&$valid!=0)
                { //   Vérifier que le n° n'est pas déja sorti
                    $tab_tir []=$x;
                    $_SESSION["tab_tir"] = $tab_tir;
                    $tirage = FALSE;
                }
            }

            $resultat = Quiz::getQuestion($x);
            require_once('views/quizView.php');
        }
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}



