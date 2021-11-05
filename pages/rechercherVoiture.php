<?php
include_once('../autoLoad/autoLoader.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Seach Car</title>
</head>
<?php
$vuevoitures = new VueVoitures();
if (isset($_POST['search'])) {
    $carFounds = $vuevoitures->researchVoituresByModels($_POST['searchModel']);
}
else{
    // header("url=rechercherVoiture.php");
}
?>

<body class="bodySearch">
    <div class="bannerSearch">
        <h2>Seach Car</h2>
        <form action="./rechercherVoiture.php" method="POST">
            <input type="search" class="searchModel" name="searchModel" placeholder="Seach Car by Model">
            <input type="submit" class="search" name="search" value="Search">
        </form>
    </div>

    <div>
        <?php
        if ($carFounds->carFound <= 0) {
        ?>
            <h2 style="color: red; padding: 2rem; text-align: center;">Oups !!!, Désolé on n'a pas <strong><?= $_POST['searchModel'] ?> dans nos model de voitures</strong></h2>
        <?php
        } else {
        ?>
            <h1>Voiture Trouvée du Model <?= $_POST['searchModel'] ?></h1>
            <div class="div-marque">
                <div class="marque"></div>
            </div>
            <div class="allCars">
                <?php
                foreach ($carFounds->voiture as $carFound) {
                ?>
                    <div class="carInfo">
                        <p class="prix"><?= $carFound->prix ?> $</p>
                        <img src="../assets/img/<?= $carFound->img ?>" alt="">
                        <h3><?= $carFound->marque ?></h3>

                        <div class="info1-2">
                            <div class="info1">
                                <p>Model : <?= $carFound->model ?></p>
                                <p>Année : <?= $carFound->annee ?></p>
                                <p>Carburant : <?= $carFound->essence ?></p>
                                <p>Vitesse : <?= $carFound->vitesse ?></p>
                            </div>

                            <div class="info2">
                                <p>Siège : <?= $carFound->nombreSiege ?></p>
                                <p>Transmition : <?= $carFound->transmition ?></p>
                                <p>Porte : <?= $carFound->nombrePorte ?></p>
                                <p>Charge : <?= $carFound->nbMalette ?></p>
                            </div>
                        </div>

                        <form action="./location.php" method="POST">
                            <input type="hidden" name="idVoiture" value="<?= $carFound->id ?>">
                            <input type="submit" name="btnRent" value="Louer Maitenant">
                        </form>
                    </div>
            <?php
                }
            }
            ?>
            </div>
    </div>
</body>

</html>