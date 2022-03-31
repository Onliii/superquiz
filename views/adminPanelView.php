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
<?php require ('navbar.php');?>
<h1 class="pageTitle">Admin Panel :</h1>
<div class="adminDiv">
    <div class="adminPlayers">
        <h1 class="adminTitle" >Gestion des Joueurs :</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Pseudo</th>
                    <th>Mail</th>
                    <th>Activité</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($players as $key => $row){
                ?>
                <tr>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['name_us']; ?></td>
                    <td><?php echo $row['fname_us']; ?></td>
                    <td><?php echo $row['nickname_us']; ?></td>
                    <td><?php echo $row['email_us']; ?></td>
                    <td><?php
                        if ($row['active_us']==0){
                            $activite='Inactif';
                        }else{
                            $activite='Actif';
                        }
                        echo ($activite); ?></td>
                    <td><?php
                        if ($row['admin_us']==0){
                            $role='Joueur';
                        }else{
                            $role='Admin';
                        }
                        echo ($role); ?></td>
                    <td><a href="index.php?page=editplayer&id=<?php echo $row['id_user']; ?>"><img src="public/img/pencil.png" class="imgAction"></a><span>  </span><a href="index.php?page=adminpanel&iddel=<?php echo $row['id_user']; ?>"><img src="public/img/trash.png" class="imgAction"></a><span>  </span><a href="index.php?page=adminpanel&idact=<?php echo $row['id_user']; ?>"><img src="public/img/plus.png" class="imgAction"></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="adminQuestions">
        <a href="index.php?page=addquestion" class="linkAddQuestion"><img src="public/img/plus.png" class="imgAddQuest"></a>
        <h1 class="adminTitle">Gestion des Questions :</h1>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Réponse 1</th>
                <th>Réponse 2</th>
                <th>Réponse 3</th>
                <th>Réponse 4</th>
                <th>Réponse</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($questions as $key => $row){
                ?>
                <tr>
                    <td><?php echo $row['num_quest']; ?></td>
                    <td><?php echo $row['question']; ?></td>
                    <td><?php echo $row['r1']; ?></td>
                    <td><?php echo $row['r2']; ?></td>
                    <td><?php echo $row['r3']; ?></td>
                    <td><?php echo $row['r4']; ?></td>
                    <td><?php echo $row['reponse']; ?></td>
                    <td><a href="index.php?page=editquestion&quest=<?php echo $row['num_quest']; ?>"><img src="public/img/pencil.png" class="imgAction"></a><span>  </span>
                        <a href="index.php?page=adminpanel&quesdel=<?php echo $row['num_quest']; ?>"><img src="public/img/trash.png" class="imgAction"></a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>