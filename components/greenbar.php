<div id="green-bar">
    <h1>
        <a href="index.php">LEVELING</a>
    </h1>
    <div class="nav-icons">
        <input type="text" name="search" placeholder="Rechercher" id="search">
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="../pages/profil/index.php">
                <img src="../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../pages/profil/index.php">
                <img class="nav-user" src="./images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="./preferences.php"><img class="nav-user" src="./images/settings.png" alt=""></a>
    </div>
</div>