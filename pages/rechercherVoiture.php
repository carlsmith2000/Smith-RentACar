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
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/styleListeVoiture.css">
    <!-- <link rel="stylesheet" href="../assets/css/styleContact.css"> -->
    <title>Seach Car</title>
</head>
<?php
$vuevoitures = new VueVoitures();
if (!isset($_POST['search'])) {
    $outPut = "";
    echo  $outPut;
} else {
    $carFounds = $vuevoitures->researchVoituresByModels($_POST['searchModel']);
}
?>

<body class="bodySearch">
    <div class="topnav" id="myTopnav">
        <h1 class="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
        <div class="g">
            <a class="" id="active" href="../index.php"> Accueil </a>
            <a class="linkOfM" href="./listeDesVoitures.php">Liste Des Voiture</a>
            <a class="linkOfM" href="./locationVoiture.php">Location</a>
            <a class="linkOfM" href="./rechercherVoiture.php">Rechercher</a>
            <a class="linkOfM" href="./chat.php">Chat</a>
            <a class="linkOfM" href="">Loisirs</a>
            <a class="linkOfM" href="./contact.php">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img class="fa fa-bars" src="../assets/img/menu_16x16.png" alt="">
            </a>
        </div>
    </div>

    <script type="text/javascript" src="../assets/Js/javaScript.js"></script>
    <div class="bannerSearch">
        <h2>Seach Car</h2>
        <form action="./rechercherVoiture.php" method="POST">
            <input type="search" class="searchModel" name="searchModel" placeholder="Seach Car by Model or Mark">
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
            <!-- <h1>Voiture Trouvée du Model <?= $_POST['searchModel'] ?></h1>
            <div class="div-marque">
                <div class="marque"></div>
            </div> -->

            <div class="container">
                <?php
                foreach ($carFounds->voiture as $car) {
                    if ($car->disponibilite == 0) {
                        $btnStatus = 'disabled';
                        $msg = 'Non';
                    } else {
                        $msg = 'Oui';
                        $btnStatus = '';
                    }
                ?>
                    <div class="product-card">
                        <div class="product-img img-one">
                            <img style="width: 100%; height: 100%;" src="../assets/img/<?= $car->img ?>" alt="">
                        </div>
                        <div class="product-text">
                            <h3><?= $car->marque ?> | <?= $car->model ?></h3>
                            <div class="info">
                                <p>
                                    <!-- Model : <strong><?= $car->model ?></strong><br> -->
                                    Année : <strong><?= $car->annee ?></strong><br>
                                    Carburant : <strong><?= $car->essence ?></strong><br>
                                    Vitesse : <strong><?= $car->vitesse ?></strong><br>
                                </p>
                                <p>
                                    Transmition : <strong><?= $car->transmition ?></strong><br>
                                    Siège : <strong><?= $car->nombreSiege ?></strong><br>
                                    Porte : <strong><?= $car->nombrePorte ?></strong><br>
                                    Charge : <strong><?= $car->nbMalette ?></strong><br>

                                </p>
                            </div>
                            <?php
                            if ($msg === 'Oui') {
                            ?>
                                <p> Disponible : <strong style="color: lime;"><?= $msg ?></strong></p>
                            <?php
                            } else {
                            ?>
                                <p> Disponible : <strong style="color: #f64646;"><?= $msg ?></strong></p>
                            <?php
                            } ?>
                        </div>
                        <div class="product-cart">
                            <form action="./location.php" method="POST">
                                <input type="hidden" name="idVoiture" value="<?= $car->id ?>">
                                <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                            </form>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            </div>
</body>

</html>