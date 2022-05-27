<div id="cover-image">
    <p id="username">
        @<?= $user['pseudo'] ?>
    </p>
    <ul>
        <li class="border-white">
            <a href=" ./profil.php">Description</a>
        </li>
        <li class="border-white">
            <a href="./profil_jeux.php">Jeux</a>
        </li>
        <li class="border-white">
            <a href=" ./profil_groupes.php">Groupes</a>
        </li>
        <li>
            <a href="./profil_amis.php">Amis</a>
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