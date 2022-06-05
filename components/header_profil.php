<div id="cover-image">
    <p id="username">
        @<?= $user['pseudo'] ?>
    </p>
    <ul>
        <li class="border-white">
            <a href="../pages/profil/index.php">Description</a>
        </li>
        <li class="border-white">
            <a href="../pages/profil/jeux.php">Jeux</a>
        </li>
        <li class="border-white">
            <a href="../pages/profil/groupes.php">Groupes</a>
        </li>
        <li>
            <a href="../pages/profil/amis.php">Amis</a>
        </li>
    </ul>

    <div id="profile-picture">
        <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp" id="pp">
        <?php
        if ($ranks === null) {
            echo "<p>No ranks</p>";
        } else {

            ?>
            <img id="lvl-icon" src="<?= $ranks[0] ?>" alt="rank" width="65px">
            <img id="lvl-rank" src="<?= $ranks[1] ?>" alt="ranks" width="400px">
        <?php } ?>
    </div>