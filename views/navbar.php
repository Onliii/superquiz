<script src="../public/js/hideNavbar.js"></script>

<div id="nav" class="navbarDiv">


    <img src="public/img/close.png" onclick="hideNavbar()" class="navbarClose">
    <br><br><br><br>
    <a href="index.php?page=home">Thèmes</a>
    <a href="index.php?page=leaderboard">LeaderBoard</a>
    <?php if ($_SESSION['admin']==1){echo ("<a href='#'>AdminPanel</a>");} ?>
    <div class="navbarId">
        <div class="navbarProfilePic">
            <img src="public/img/user.png">
        </div>
        <div class="navbarProfile">
            <p><?php echo($_SESSION['nickname']); ?></p>
            <p><?php echo($_SESSION['role']); ?></p>
            <button onclick="window.location.href='\index.php?page=logout'" class="logout">Déconnexion</button>
        </div>
    </div>
</div>

<img src="public/img/menu.png" class="navbarIcon" id="button" onclick="showNavbar()">