<?php
include_once('../autoLoad/autoLoader.php');
$vueClient = new VueClients();
$vueVoitures = new VueVoitures();
$vueLocation = new VueLocations();

$controleurVoitures = new ControleurVoitures();
$vueVoitures = new VueVoitures();

$controleurLocation = new ControleurLocations();
$vueLocation = new VueLocations();

if (isset($_POST['valider'])) {
    $dateDebutLoc = $_POST['dateDebutLoc'];
    $dateFinLoc = $_POST['dateFinLoc'];
    $pays = $_POST['pays'];
    $idVoiture = $_POST['voiture'];
    $response = $vueVoitures->researchVoitureById($idVoiture)->voiture;
    $client = $vueClient->researchTenetById($_POST['noCompte']);
    if($client->found <=0){
        header("location:./creationCompteClient.php");
    }
}


// echo $montantT;
$date = date_diff(new DateTime($dateDebutLoc), new DateTime($dateFinLoc));
$montantT = $date->days * $response->prix;
if (isset($_POST['confirmer'])) {
?>
    <script>
        alert("Location fait avec succès");
    </script>
<?php
    $controleurLocation->enregistrerLocation(
        $_POST['idClient'],
        $_POST['idVtr'],
        $_POST['dateDebutLoc'],
        $_POST['dateFinLoc'],
        $_POST['pays'],
        $_POST['montantT']
    );
    $controleurVoitures->updateVoitureLouerById($_POST['idVtr'], 0);
    header("location:./listeDesVoitures.php");
}
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
</head>

<body class="bodyLocation">

    <div class="topnav" id="myTopnav">
        <h1 class="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
        <div>
            <a class="" id="active" href="./index.php"> Accueil </a>
            <a class="linkOfM" href="./pages/listeDesVoitures.php">Liste Des Voiture</a>
            <a class="linkOfM" href="./pages/locationVoiture.php">Location</a>
            <a class="linkOfM" href="./pages/rechercherVoiture.php">Rechercher</a>
            <a class="linkOfM" href="./pages/chat.php">Chat</a>
            <a class="linkOfM" href="">Loisirs</a>
            <a class="linkOfM" href="./pages/contact.php">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img class="fa fa-bars" src="./assets/img/menu_16x16.png" alt="">
            </a>
        </div>

    </div>
    <script type="text/javascript" src="../assets/Js/javaScript.js"></script>

    <div class="location-div">
        <div class="container">
            <div class="product-card">
                <div class="product-img img-one">
                    <img style="width: 100%; height: 100%;" src="../assets/img/<?= $response->img ?>" alt="">
                </div>
                <div class="product-text">
                    <h3><?= $response->marque ?> | <?= $response->model ?></h3>
                    <div class="info">
                        <p>
                            <!-- Model : <strong><?= $response->model ?></strong><br> -->
                            Année : <strong><?= $response->annee ?></strong><br>
                            Carburant : <strong><?= $response->essence ?></strong><br>
                            Vitesse : <strong><?= $response->vitesse ?></strong><br>
                        </p>
                        <p>
                            Transmition : <strong><?= $response->transmition ?></strong><br>
                            Siège : <strong><?= $response->nombreSiege ?></strong><br>
                            Porte : <strong><?= $response->nombrePorte ?></strong><br>
                            Charge : <strong><?= $response->nbMalette ?></strong><br>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div>

            <form action="./ficheLocation.php" method="POST">

                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="nomClient">Nom Complet Client</label>
                        <input class="input input-2" type="text" name="nomClient" value="<?= $client->clientFound->nomComplet ?>" readonly>
                    </div>

                    <div class="labelIput">
                        <label for="dateDebutLoc">Date Debut Location</label>
                        <input class="input input-2" type="datetime-local" name="dateDebutLoc" value="<?= $dateDebutLoc ?>" readonly>
                        <!-- disabledo -->
                    </div>
                </div>


                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="adresseClient">Adresse Client</label>
                        <input class="input input-2" type="text" name="adresseClient" value="<?= $client->clientFound->adresse ?>" readonly>
                    </div>


                    <div class="labelIput">
                        <label for="mailClient">Email Client</label>
                        <input class="input input-2" type="mail" name="mailClient" value="<?= $client->clientFound->mail ?>" readonly>
                    </div>
                </div>

                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="dateFinLoc">Date Fin Location</label>
                        <input class="input input-2" type="datetime-local" name="dateFinLoc" value="<?= $dateFinLoc ?>" readonly>
                    </div>

                    <div class="labelIput">
                        <label for="noCompte">Pays De Ramassage</label>
                        <input class="input input-2" type="text" name="pays" value="<?= $pays ?>" readonly>
                    </div>


                </div>

                <input type="hidden" name="montantT" value="<?= $montantT ?> ">
                <input type="hidden" name="idVtr" value="<?= $idVoiture ?> ">
                <input type="hidden" name="idClient" value="<?= $client->clientFound->id_client ?> " readonly>
                <input class="btn" type="submit" name="confirmer" value="Valider">
            </form>
        </div>

        <div class="paiement">
            <h3 style="color: white;">Mode Paiement</h3>

            <div class="labelIput ">
                <label for="modePaiement">Payer Par</label>
                <select class="input" name="modePaiement" id="modePaiement" onchange="chageTypeInput()">
                    <option value="3">Choisissez votre mode Paiement</option>
                    <option value="0">Carte</option>
                    <option value="1">Mon Cash</option>
                </select>
            </div>

            <div class="labelIput" id="carte">
                <label for="numeroCarte" id="noCarteL">numero Carte</label>
                <input id="noCarte" class="input" type="number" name="numeroCarte" required>
            </div>


            <div class="labelIput" id="moncash">
                <label for="numeroCarte" id="noMonCashL">numero Téléphone Mon Cash</label>
                <input id="noMonCash" class="input" type="number" name="numeroCarte" required>
            </div>

            <div class="labelIput" id="motantTotal">
                <label for="numeroCarte" id="noCarteL">Motant Total a Payer</label>
                <input id="noCarte" class="input" type="text" name="motantTotal" value="<?= $montantT ?> $" readonly>
            </div>
        </div>
    </div>
    </div>
</body>

</html>