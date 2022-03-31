<!DOCTYPE html>
<html>
<head>
    <title>Résultats - SuperQuiz</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
</head>
<body>


<div class="indexDiv">
    <h1>Correctif :</h1>
    <h2>Votre quiz est terminé avec le score de <?php echo ($_SESSION['score']."/".($_SESSION['nq']-1));?><br></h2>
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Réponse</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cpt2=0;
            foreach ($tabQuest as $key){
                echo ("<tr>");
                echo ("<td>".$tabQuest[$cpt2]."</td>");
                echo ("<td>".$tabCorr[$cpt2]."</td>");
                echo ("</tr>");
                $cpt2++;
            }
            ?>
        </tbody>
    </table>
    <a href="index.php?page=home" class="indexButton">Retour a l'accueil</a>
</div>

</body>
</html>