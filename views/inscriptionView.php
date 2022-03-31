<!DOCTYPE>
<html>
<head>
    <title>Inscrivez-vous</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
    <script src="public/js/errorConnexion.js"></script>
</head>
<body>
<div class="inscriptionDiv">
    <h1>Inscription :</h1>
    <br>
    <h2>Remplissez les champs ci-dessous</h2>
    <form method="post" action="" name="inscriptionForm" onsubmit="return errorSignin()">
        <label>Nom :</label><br>
        <input type="text" name="name">
        <br>
        <label>Prénom :</label><br>
        <input type="text" name="fname">
        <br>
        <label>E-mail :</label><br>
        <input type="email" name="email">
        <br>
        <label>Pseudonyme :</label><br>
        <input type="text" name="login">
        <br>
        <label>Mot de passe :</label><br>
        <input type="password" name="pwd">
        <br>
        <label>Confirmez le mot de passe :</label><br>
        <input type="password" name="confPwd">
        <br>
        <button class="inscriptionButton" type="submit" >S'inscrire</button>
        <br><br>
        <a href="index.php" class="inscriptionLink">Retour</a>
    </form>
</div>
</body>
</html>