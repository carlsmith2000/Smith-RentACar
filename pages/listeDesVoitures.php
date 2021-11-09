<?php
include_once('../autoLoad/autoLoader.php');

$vuevoitures = new VueVoitures();
$allVoiture =  $vuevoitures->getAllVoiture();

$range_overs = $vuevoitures->researchVoituresByMarques('Rang Rover')->voiture;
$Jepps = $vuevoitures->researchVoituresByMarques('Jepp')->voiture;
$Infinitis = $vuevoitures->researchVoituresByMarques('Infiniti')->voiture;
$Fords = $vuevoitures->researchVoituresByMarques('Ford')->voiture;
$Fiats = $vuevoitures->researchVoituresByMarques('Fiat')->voiture;
$btnStatus = '';
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleListeVoiture.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <title>Document</title>
</head>

<body>
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

    <center>
        <h1 style="margin-top: 5%;margin-bottom: -5%;">RANG ROVER</h1>
    </center>
    <div class="container">

        <?php
        foreach ($range_overs as $range_over) {
            if ($range_over->disponibilite == 0) {
                $btnStatus = 'disabled';
                $msg = 'Non';
            } else {
                $msg = 'Oui';
                $btnStatus = '';
            }
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $range_over->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $range_over->marque ?> | <?= $range_over->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $range_over->model ?></strong><br> -->
                            Année : <strong><?= $range_over->annee ?></strong><br>
                            Carburant : <strong><?= $range_over->essence ?></strong><br>
                            Vitesse : <strong><?= $range_over->vitesse ?></strong><br>
                        </p>
                        <p>
                            Transmition : <strong><?= $range_over->transmition ?></strong><br>
                            Siège : <strong><?= $range_over->nombreSiege ?></strong><br>
                            Porte : <strong><?= $range_over->nombrePorte ?></strong><br>
                            Charge : <strong><?= $range_over->nbMalette ?></strong><br>

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
                        <input type="hidden" name="idVoiture" value="<?= $range_over->id ?>">
                        <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- ---------------------------------------------------------------------------------------------- -->
    <center>
        <h1 style="margin-top: 4%;margin-bottom: -4%;">JEPP</h1>
    </center>

    <div class="container">
        <?php
        foreach ($Jepps as $Jepp) {
            if ($Jepp->disponibilite == 0) {
                $btnStatus = 'disabled';
                $msg = 'Non';
            } else {
                $msg = 'Oui';
                $btnStatus = '';
            }
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $Jepp->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $Jepp->marque ?> | <?= $Jepp->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $Jepp->model ?></strong><br> -->
                            Année : <strong><?= $Jepp->annee ?></strong><br>
                            Carburant : <strong><?= $Jepp->essence ?></strong><br>
                            Vitesse : <strong><?= $Jepp->vitesse ?></strong><br>
                        </p>
                        <p>

                            Siège : <strong><?= $Jepp->nombreSiege ?></strong><br>
                            Transmition : <strong><?= $Jepp->transmition ?></strong><br>
                            Porte : <strong><?= $Jepp->nombrePorte ?></strong><br>
                            Charge : <strong><?= $Jepp->nbMalette ?></strong><br>
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
                        <input type="hidden" name="idVoiture" value="<?= $Jepp->id ?>">
                        <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


    <center>
        <h1 style="margin-top: 4%;margin-bottom: -4%;">INFINITI</h1>
    </center>

    <div class="container">
        <?php
        foreach ($Infinitis  as $Infiniti) {
            if ($Infiniti->disponibilite == 0) {
                $btnStatus = 'disabled';
                $msg = 'Non';
            } else {
                $msg = 'Oui';
                $btnStatus = '';
            }
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $Infiniti->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $Infiniti->marque ?> | <?= $Infiniti->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $Infiniti->model ?></strong><br> -->
                            Année : <strong><?= $Infiniti->annee ?></strong><br>
                            Carburant : <strong><?= $Infiniti->essence ?></strong><br>
                            Vitesse : <strong><?= $Infiniti->vitesse ?></strong><br>
                        </p>
                        <p>

                            Siège : <strong><?= $Infiniti->nombreSiege ?></strong><br>
                            Transmition : <strong><?= $Infiniti->transmition ?></strong><br>
                            Porte : <strong><?= $Infiniti->nombrePorte ?></strong><br>
                            Charge : <strong><?= $Infiniti->nbMalette ?></strong><br>
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
                        <input type="hidden" name="idVoiture" value="<?= $Infiniti->id ?>">
                        <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <center>
        <h1 style="margin-top: 4%;margin-bottom: -4%;">FORD</h1>
    </center>

    <div class="container">
        <?php
        foreach ($Fords  as $Ford) {
            if ($Ford->disponibilite == 0) {
                $btnStatus = 'disabled';
                $msg = 'Non';
            } else {
                $msg = 'Oui';
                $btnStatus = '';
            }
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $Ford->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $Ford->marque ?> | <?= $Ford->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $Ford->model ?></strong><br> -->
                            Année : <strong><?= $Ford->annee ?></strong><br>
                            Carburant : <strong><?= $Ford->essence ?></strong><br>
                            Vitesse : <strong><?= $Ford->vitesse ?></strong><br>
                        </p>
                        <p>

                            Siège : <strong><?= $Ford->nombreSiege ?></strong><br>
                            Transmition : <strong><?= $Ford->transmition ?></strong><br>
                            Porte : <strong><?= $Ford->nombrePorte ?></strong><br>
                            Charge : <strong><?= $Ford->nbMalette ?></strong><br>
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
                        <input type="hidden" name="idVoiture" value="<?= $Ford->id ?>">
                        <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <center>
        <h1 style="margin-top: 4%;margin-bottom: -4%;">FIAT</h1>
    </center>

    <div class="container">
        <?php
        foreach ($Fiats  as $Fiat) {
            if ($Fiat->disponibilite == 0) {
                $btnStatus = 'disabled';
                $msg = 'Non';
            } else {
                $msg = 'Oui';
                $btnStatus = '';
            }
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $Fiat->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $Fiat->marque ?> | <?= $Fiat->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $Fiat->model ?></strong><br> -->
                            Année : <strong><?= $Fiat->annee ?></strong><br>
                            Carburant : <strong><?= $Fiat->essence ?></strong><br>
                            Vitesse : <strong><?= $Fiat->vitesse ?></strong><br>
                        </p>
                        <p>

                            Siège : <strong><?= $Fiat->nombreSiege ?></strong><br>
                            Transmition : <strong><?= $Fiat->transmition ?></strong><br>
                            Porte : <strong><?= $Fiat->nombrePorte ?></strong><br>
                            Charge : <strong><?= $Fiat->nbMalette ?></strong><br>
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
                        <input type="hidden" name="idVoiture" value="<?= $Fiat->id ?>">
                        <button type="submit" name="btnRent" <?= $btnStatus ?>>Louer Maitenant</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>