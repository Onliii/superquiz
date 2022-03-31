<!DOCTYPE html>
<html>
<head>
    <title>AdminPanel - SuperQuiz</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
    <script src="public/js/errorConnexion.js"></script>
</head>
<body>
<?php require ("navbar.php"); ?>
<div class="indexDiv">
    <h1>Ajoutez une question :</h1>
    <form method="post" action="" name="inscriptionForm" onsubmit="errorSignin()">
        <label>Question :</label><br>
        <input type="text" name="question" required>
        <br>
        <label>Réponse 1 :</label><br>
        <input type="text" name="r1" required>
        <br>
        <label>Réponse 2 :</label><br>
        <input type="text" name="r2" required>
        <br>
        <label>Réponse 3 :</label><br>
        <input type="text" name="r3" required>
        <br>
        <label>Réponse 4 :</label><br>
        <input type="text" name="r4" required>
        <br>
        <label>Réponse correcte :</label><br>
        <input type="radio" id="repQ" value="1" name="repQ" checked><label>Réponse 1</label>
        <input type="radio" id="repQ" value="2" name="repQ"><label>Réponse 2</label>
        <input type="radio" id="repQ" value="3" name="repQ"><label>Réponse 3</label>
        <input type="radio" id="repQ" value="4" name="repQ"><label>Réponse 4</label>
        <br>



        <button class="inscriptionButton" type="submit" >Ajouter</button>
        <br>
        <a href="index.php?page=adminpanel" class="inscriptionLink">Retour</a>
    </form>
</div>
</body>
