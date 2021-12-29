<?php
require_once('models/quizModel.php');
function quizPage(){
    try{
        $max_quest = 10; // Nbre maximum de questions à poser par quiz
        $nbr_rec = Quiz::getAllCountQuestion(); // nombre de records dans la table

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

        if($nq > $max_quest){

            echo "Votre quiz est terminé avec le score de <b>".$score." / ".$max_quest."</B><br>";
            echo '<a href="index.php?page=home"> Je voudrais refaire un autre quiz </a>';
            unset($_SESSION["nq"],$_SESSION["tab_tir"],$_SESSION["score"],$_SESSION["ok"]);

        }
        else
        { // Pas la fin du quiz

            //Générer un nombre aléatoire de 0 à $nbr_rec - 1
            $tirage = TRUE;
            while($tirage)
            {
                $x = rand(1,$nbr_rec);  // Générer un nombre aléatoire
                if (!in_array($x, $tab_tir))
                { //   Vérifier que le n° n'est pas déja sorti
                    $tab_tir []=$x;
                    $_SESSION["tab_tir"] = $tab_tir;
                    $tirage = FALSE;
                }
            }

            $resultat = Quiz::getDrawnQuestion($x);

            require_once('views/quizView.php');
        }
    }catch(PDOException $e){
        $msgError='Page introuvable'. $e ->getMessage();
        require "views/errorView.php";
    }
}



