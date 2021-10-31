<?php
include_once('../autoLoad/autoLoader.php');

$vuevoitures = new VueVoitures();
$allVoiture =  $vuevoitures->getAllVoiture();

$range_overs = $vuevoitures->researchVoituresByMarques('Rang Rover');
$Jepps = $vuevoitures->researchVoituresByMarques('Jepp');
$Infinitis = $vuevoitures->researchVoituresByMarques('Infiniti');
$Fords = $vuevoitures->researchVoituresByMarques('Ford');
$Fiats = $vuevoitures->researchVoituresByMarques('Fiat');
// echo '<pre>'; 
// print_r($allVoiture);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>SMITH RENT | CARS</title>
</head>

<body>
    <div class="banner">
        <h1>LISTE DES VOITURES</h1>
    </div>
    <div>
        <h1>RANG OVER</h1>
        <div class="div-marque">
            <div class="marque"></div>
        </div>
        <div class="allCars">
            <?php
            foreach ($range_overs as $range_over) {
            ?>
                <div class="carInfo">
                    <p class="prix"><?= $range_over->prix ?> $</p>
                    <img src="../assets/img/<?= $range_over->img ?>" alt="">
                    <h3><?= $range_over->marque ?></h3>

                    <div class="info1-2">
                        <div class="info1">
                            <p>Model : <?= $range_over->model ?></p>
                            <p>Année : <?= $range_over->annee ?></p>
                            <p>Carburant : <?= $range_over->essence ?></p>
                            <p>Vitesse : <?= $range_over->vitesse ?></p>
                        </div>

                        <div class="info2">
                            <p>Siège : <?= $range_over->nombreSiege ?></p>
                            <p>Transmition : <?= $range_over->transmition ?></p>
                            <p>Porte : <?= $range_over->nombrePorte ?></p>
                            <p>Charge : <?= $range_over->nbMalette ?></p>
                        </div>
                    </div>

                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $range_over->id ?>">
                        <input type="submit" name="btnRent"  value="Louer Maitenant">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="promotion">

        <!-- <h2>Le Noveau Tesla 2022</h2> -->
        <img src="../assets/img/Jeep_Wrangler_80th_FirecrackerRed_2p_565x330.png" alt="">
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, dolorum hic. Ex asperiores quam sequi quasi assumenda ad illum magni velit, ea necessitatibus nihil.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nulla eos repudiandae repellendus repellat dolorum, molestias tempore atque mollitia veniam sint consequatur cupiditate tempora ex doloribus quo cum pariatur voluptatum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, nulla, placeat fugit illum aperiam aliquid hic minima reiciendis nisi tempora illo iste alias, corporis expedita. Cupiditate asperiores ut impedit atque?
        </p>
    </div>

    <div>
        <h1>JEPP</h1>
        <div class="div-marque">
            <div class="marque"></div>
        </div>
        <div class="allCars">
            <?php
            foreach ($Jepps as $Jepp) {
            ?>
                <div class="carInfo">
                    <p class="prix"><?= $Jepp->prix ?> $</p>
                    <img src="../assets/img/<?= $Jepp->img ?>" alt="">
                    <h3><?= $Jepp->marque ?></h3>

                    <div class="info1-2">
                        <div class="info1">
                            <p>Model : <?= $Jepp->model ?></p>
                            <p>Année : <?= $Jepp->annee ?></p>
                            <p>Carburant : <?= $Jepp->essence ?></p>
                            <p>Vitesse : <?= $Jepp->vitesse ?></p>
                        </div>

                        <div class="info2">
                            <p>Siège : <?= $Jepp->nombreSiege ?></p>
                            <p>Transmition : <?= $Jepp->transmition ?></p>
                            <p>Porte : <?= $Jepp->nombrePorte ?></p>
                            <p>Charge : <?= $Jepp->nbMalette ?></p>
                        </div>
                    </div>
                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $Jepp->id ?>">
                        <input type="submit" name="btnRent"  value="Louer Maitenant">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>



    <div>
        <h1>INFINITI</h1>
        <div class="div-marque">
            <div class="marque"></div>
        </div>
        <div class="allCars">
            <?php
            foreach ($Infinitis as $Infiniti) {
            ?>
                <div class="carInfo">
                    <p class="prix"><?= $Infiniti->prix ?> $</p>
                    <img src="../assets/img/<?= $Infiniti->img ?>" alt="">
                    <h3><?= $Infiniti->marque ?></h3>

                    <div class="info1-2">
                        <div class="info1">
                            <p>Model : <?= $Infiniti->model ?></p>
                            <p>Année : <?= $Infiniti->annee ?></p>
                            <p>Carburant : <?= $Infiniti->essence ?></p>
                            <p>Vitesse : <?= $Infiniti->vitesse ?></p>
                        </div>

                        <div class="info2">
                            <p>Siège : <?= $Infiniti->nombreSiege ?></p>
                            <p>Transmition : <?= $Infiniti->transmition ?></p>
                            <p>Porte : <?= $Infiniti->nombrePorte ?></p>
                            <p>Charge : <?= $Infiniti->nbMalette ?></p>
                        </div>
                    </div>
                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $Infiniti->id ?>">

                        <input type="submit" name="btnRent"  value="Louer Maitenant">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="promotion">

        <!-- <h2>Le Noveau Tesla 2022</h2> -->
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, dolorum hic. Ex asperiores quam sequi quasi assumenda ad illum magni velit, ea necessitatibus nihil.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nulla eos repudiandae repellendus repellat dolorum, molestias tempore atque mollitia veniam sint consequatur cupiditate tempora ex doloribus quo cum pariatur voluptatum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, nulla, placeat fugit illum aperiam aliquid hic minima reiciendis nisi tempora illo iste alias, corporis expedita. Cupiditate asperiores ut impedit atque?
        </p>
        <img src="../assets/img/FORD-Mustang-Shelby-GT350-5339_26.jpg" alt="">
    </div>

    <div>
        <h1>FORD</h1>
        <div class="div-marque">
            <div class="marque"></div>
        </div>
        <div class="allCars">
            <?php
            foreach ($Fords as $Ford) {
            ?>
                <div class="carInfo">
                    <p class="prix"><?= $Ford->prix ?> $</p>
                    <img src="../assets/img/<?= $Ford->img ?>" alt="">
                    <h3><?= $Ford->marque ?></h3>

                    <div class="info1-2">
                        <div class="info1">
                            <p>Model : <?= $Ford->model ?></p>
                            <p>Année : <?= $Ford->annee ?></p>
                            <p>Carburant : <?= $Ford->essence ?></p>
                            <p>Vitesse : <?= $Ford->vitesse ?></p>
                        </div>

                        <div class="info2">
                            <p>Siège : <?= $Ford->nombreSiege ?></p>
                            <p>Transmition : <?= $Ford->transmition ?></p>
                            <p>Porte : <?= $Ford->nombrePorte ?></p>
                            <p>Charge : <?= $Ford->nbMalette ?></p>
                        </div>
                    </div>
                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $Ford->id ?>">
                        <input type="submit" name="btnRent"  value="Louer Maitenant">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <div>
        <h1>FIAT</h1>
        <div class="div-marque">
            <div class="marque"></div>
        </div>
        <div class="allCars">
            <?php
            foreach ($Fiats as $Fiat) {
            ?>
                <div class="carInfo">
                    <p class="prix"><?= $Fiat->prix ?> $</p>
                    <img src="../assets/img/<?= $Fiat->img ?>" alt="">
                    <h3><?= $Fiat->marque ?></h3>

                    <div class="info1-2">
                        <div class="info1">
                            <p>Model : <?= $Fiat->model ?></p>
                            <p>Année : <?= $Fiat->annee ?></p>
                            <p>Carburant : <?= $Fiat->essence ?></p>
                            <p>Vitesse : <?= $Fiat->vitesse ?></p>
                        </div>

                        <div class="info2">
                            <p>Siège : <?= $Fiat->nombreSiege ?></p>
                            <p>Transmition : <?= $Fiat->transmition ?></p>
                            <p>Porte : <?= $Fiat->nombrePorte ?></p>
                            <p>Charge : <?= $Fiat->nbMalette ?></p>
                        </div>
                    </div>
                    <form action="./location.php" method="POST">
                        <input type="hidden" name="idVoiture" value="<?= $Fiat->id ?>">
                        <input type="submit" name="btnRent"  value="Louer Maitenant">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


</body>

</html>