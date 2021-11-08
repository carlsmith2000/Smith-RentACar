<?php
include_once('../autoLoad/autoLoader.php');

$vuevoitures = new VueVoitures();
$allVoiture =  $vuevoitures->getAllVoiture();

$range_overs = $vuevoitures->researchVoituresByMarques('Rang Rover')->voiture;
$Jepps = $vuevoitures->researchVoituresByMarques('Jepp')->voiture;
$Infinitis = $vuevoitures->researchVoituresByMarques('Infiniti')->voiture;
$Fords = $vuevoitures->researchVoituresByMarques('Ford')->voiture;
$Fiats = $vuevoitures->researchVoituresByMarques('Fiat')->voiture;

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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

    <div class="container">
        <?php
        foreach ($range_overs as $range_over) {
        ?>
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 110px;" src="../assets/img/<?= $range_over->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $range_over->marque ?></h3>
                    <div class="info">
                        <p>
                            Model : <strong><?= $range_over->model ?></strong><br>
                            Année : <strong><?= $range_over->annee ?></strong><br>
                            Carburant : <strong><?= $range_over->essence ?></strong><br>
                            Vitesse : <strong><?= $range_over->vitesse ?></strong><br>
                        </p>
                        <p>

                            Siège : <strong><?= $range_over->nombreSiege ?></strong><br>
                            Transmition : <strong><?= $range_over->transmition ?></strong><br>
                            Porte : <strong><?= $range_over->nombrePorte ?></strong><br>
                            Charge : <strong><?= $range_over->nbMalette ?></strong><br>
                        </p>
                    </div>

                </div>
                <div class="product-cart">
                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $range_over->id ?>">
                        <button type="submit" name="btnRent" value="Louer Maitenant">Add to cart</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>