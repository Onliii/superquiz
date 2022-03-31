<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue sur SuperQuiz !</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/brain.png">
    <script src="public/js/errorConnexion.js"></script>
</head>
<body class="index">

<div class="indexDiv">
    <h1 class="indexWelcome">Bienvenue sur SuperQuiz !</h1>
    <img src="public/img/brain.png" class="indexLogo">
    <h2 class="indexConnecting">Connectez-vous pour jouer !</h2>
    <form method="post" onsubmit="return errorConnexion()" name="acceuilForm" action="">
        <label class="indexLabel">Pseudo :</label>
        <br>
        <input type="text" name="login" id="login">
        <br>
        <label class="indexLabel">Mot de passe :</label>
        <br>
        <input type="password" name="pwd" id="pwd">
        <br>
        <button class="indexButton" type="submit" id="connecting" name="">Connexion</button>
    </form>
    <a href="index.php?page=inscription" class="indexLink">Vous n'avez pas de compte ?</a>
</div>
</body>
</html>
