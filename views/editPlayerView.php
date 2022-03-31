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
<h1>Modifier les informations de : <?=$result['nickname_us']?></h1>

    <form method="post" action="" name="inscriptionForm" onsubmit="errorSignin()">
        <label>Nom :</label><br>
        <input type="text" name="name" value="<?=$result['name_us']?>" required>
        <br>
        <label>Prénom :</label><br>
        <input type="text" name="fname" value="<?=$result['fname_us']?>" required>
        <br>
        <label>Pseudonyme :</label><br>
        <input type="text" name="nicknameUS" value="<?php echo($result['nickname_us']);?>" required>
        <br>
        <label>E-mail :</label><br>
        <input type="email" name="email" value="<?php echo($result['email_us']);?>" required>
        <br>
        <label>Administrateur :</label><br>
        <input type="radio" id="radioAdmin" value="0" name="role" <?php if ($result['admin_us']==0){echo ('checked');} ?>><label>Joueur</label>
        <input type="radio" id="radioAdmin" value="1" name="role" <?php if ($result['admin_us']==1){echo ('checked');} ?>><label>Admin</label>
        <br>
        <button class="inscriptionButton" type="submit" name="button">Modifier</button>
        <br>
        <a href="index.php?page=adminpanel" class="inscriptionLink">Retour</a>
    </form>
</div>

</body>
