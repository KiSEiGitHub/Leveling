<?php
session_start();

if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
    exit;
}

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Leveling</title>

    <!--  CSS  -->
    <link rel="stylesheet" href="scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php
$TousMesUser = $controler->getAllUsers();
function getRandomWord($len = 10)
{
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

foreach ($TousMesUser as $UnDeMesUser) {
    $BSONE = getRandomWord(25) . $UnDeMesUser['id'];
    $BSTWO = getRandomWord(25) . $UnDeMesUser['id'];
    $BSTHREE = getRandomWord(25) . $UnDeMesUser['id'];
    $BSFOUR = getRandomWord(25) . $UnDeMesUser['id'];
    ?>

    <!-- Accordion -->
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#<?= $BSONE ?>"
                        aria-expanded="true" aria-controls="collapseOne">
                    <?= $UnDeMesUser['pseudo'] ?>
                </button>
            </h2>
            <div id="<?= $BSONE ?>" class="accordion-collapse collapse show"
                 aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>bio : <?= $UnDeMesUser['bio'] ?></p>

                    <!-- Add user -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#<?= $BSTWO ?>">
                        <i class="fa-solid fa-user-plus"></i>
                    </button>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#<?= $BSTHREE ?>"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#<?= $BSFOUR ?>"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Bio
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="<?= $BSTHREE ?>" role="tabpanel"
                             aria-labelledby="home-tab">
                            <p> <?= $UnDeMesUser['prenom'] ?></p>
                            <p> <?= $UnDeMesUser['nom'] ?></p>
                            <p> <?= $UnDeMesUser['mail'] ?></p>
                        </div>
                        <div class="tab-pane fade" id="<?= $BSFOUR ?>" role="tabpanel"
                             aria-labelledby="profile-tab">
                            <p> <?= $UnDeMesUser['bio'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="<?= $BSTWO ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvel ami !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        User : <?= $UnDeMesUser['pseudo'] ?> ajouté !
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script src="js/main.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>