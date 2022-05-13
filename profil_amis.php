<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap');
    </style>
    <link rel="stylesheet" href="scss/styles.css">
    <title>Amis</title>
</head>

<body>

    <div id="green-bar">
        <h1>LEVELING</h1>
        <div class="nav-icons">
            <input type="text" name="search" placeholder="Rechercher" id="search">
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <a href="./profil.php"><img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user alt=" pfp"></a>
            <?php
            } else { ?>
                <a href="./profil.php"><img class="nav-user" src="./images/user-circle.png" alt=""></a>
            <?php } ?>
            <a href="./settings.php"><img class="nav-user" src="./images/settings.png" alt=""></a>
        </div>
    </div>

</body>

</html>