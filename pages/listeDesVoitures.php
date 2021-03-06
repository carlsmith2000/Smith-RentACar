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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/Js/responsive-nav.js"></script>
    <title>Document</title>
</head>

<body class="list">
<header>
        <a href="../index.php" class="logo" data-scroll>SMITH<span class="s">'S</span> RENT CAR</a>
        <nav class="nav-collapse">
            <ul>
                <li class="menu-item active"><a href="../index.php"> Accueil</a></li>
                <!-- <li class="menu-item"><a href="#services" data-scroll>services</a></li> -->
                <li class="menu-item"><a href="./listeDesVoitures.php">Liste Des Voiture</a></li>
                <li class="menu-item"><a href="./locationVoiture.php">Location</a></li>
                <li class="menu-item"><a href="./chat.php">Chat</a></li>
                <li class="menu-item"><a href="./rechercherVoiture.php">Rechercher</a></li>
                <li class="menu-item"><a href="./loisir.php">Loisirs</a></li>
                <li class="menu-item"><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <script src="../assets/Js/fastclick.js"></script>
    <script src="../assets/Js/scroll.js"></script>
    <script src="../assets/Js/fixed-responsive-nav.js"></script>

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
                            Ann??e : <strong><?= $range_over->annee ?></strong><br>
                            Carburant : <strong><?= $range_over->essence ?></strong><br>
                            Vitesse : <strong><?= $range_over->vitesse ?></strong><br>
                        </p>
                        <p>
                            Transmition : <strong><?= $range_over->transmition ?></strong><br>
                            Si??ge : <strong><?= $range_over->nombreSiege ?></strong><br>
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
                            Ann??e : <strong><?= $Jepp->annee ?></strong><br>
                            Carburant : <strong><?= $Jepp->essence ?></strong><br>
                            Vitesse : <strong><?= $Jepp->vitesse ?></strong><br>
                        </p>
                        <p>

                            Si??ge : <strong><?= $Jepp->nombreSiege ?></strong><br>
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
                            Ann??e : <strong><?= $Infiniti->annee ?></strong><br>
                            Carburant : <strong><?= $Infiniti->essence ?></strong><br>
                            Vitesse : <strong><?= $Infiniti->vitesse ?></strong><br>
                        </p>
                        <p>

                            Si??ge : <strong><?= $Infiniti->nombreSiege ?></strong><br>
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
                            Ann??e : <strong><?= $Ford->annee ?></strong><br>
                            Carburant : <strong><?= $Ford->essence ?></strong><br>
                            Vitesse : <strong><?= $Ford->vitesse ?></strong><br>
                        </p>
                        <p>

                            Si??ge : <strong><?= $Ford->nombreSiege ?></strong><br>
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
                            Ann??e : <strong><?= $Fiat->annee ?></strong><br>
                            Carburant : <strong><?= $Fiat->essence ?></strong><br>
                            Vitesse : <strong><?= $Fiat->vitesse ?></strong><br>
                        </p>
                        <p>

                            Si??ge : <strong><?= $Fiat->nombreSiege ?></strong><br>
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