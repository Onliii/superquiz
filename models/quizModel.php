<?php

class Quiz
{
    // Methods
    public static function getAllCountQuestion()
    {
        require('private/db.php');

        $query = $db->prepare("SELECT COUNT(*) FROM quiz");
        $query->execute();
        $resultat = $query->fetch();

        return $resultat[0];
    }

    public static function getDrawnQuestion($questionNumber)
    {
        require_once('private/db.php');

        $requete = $db->prepare("SELECT * FROM quiz WHERE num_quest = $questionNumber");
        $requete->execute();
        $resultat = $requete->fetch();

        return $resultat;
    }
}
