<!DOCTYPE>
<html>
<head>
    <title>Leaderboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
    <script src="public/js/hideNavbar.js"></script>
</head>
<body>
<?php require ("navbar.php"); ?>
<h1 class="pageTitle">LeaderBoard :</h1>
<div class="indexDiv">
    <table>
        <thead>
            <tr>
                <th>Place :</th>
                <th>Nom du joueur :</th>
                <th>Score :</th>
                <th>Date de la partie :</th>
                <th>Essais :</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cpt=0;
            foreach ($tab_name as $key){
                $place=$cpt+1;
                echo('<tr>');
                echo ("<td>".$place."</td>");
                echo ("<td>".$tab_name[$cpt]."</td>");
                echo ("<td>".$tab_score[$cpt]."</td>");
                echo("<td>".$tab_date[$cpt]."</td>");
                echo("<td>".$tab_attemps[$cpt]."</td>");
                echo('</tr>');

                $cpt++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>


