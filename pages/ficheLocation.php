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
    $heureDebutLoc = $_POST['heureDebutLoc'];
    $dateFinLoc = $_POST['dateFinLoc'];
    $heureFinLoc = $_POST['heureFinLoc'];
    $pays = $_POST['pays'];
    $idVoiture = $_POST['idVtr'];
    $response = $vueVoitures->researchVoitureById($idVoiture);
    $client = $vueClient->researchTenetById($_POST['noCompte']);
    

}
if(isset($_POST['confirmer'])){
    ?>
        <script>
            alert("Location fait avec succès");
        </script>
    <?php
    $controleurLocation->enregistrerLocation(
        $_POST['idClient'],
        $_POST['idVtr'],
        $_POST['dateDebutLoc'],
        $_POST['heureDebutLoc'],
        $_POST['dateFinLoc'],
        $_POST['heureFinLoc'],
        $_POST['pays']
    );
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
    <title>Smith Rent | Fiche Location</title>
</head>

<body class="bodyLocation">
    <div class="location-div">

        <div class="allCars" style="margin-top: 5rem;">
            <div class="carInfo">
                <p class="prix"><?= $response->voiture->prix ?> $ / j</p>
                <img src="../assets/img/<?= $response->voiture->img ?>" alt="">
                <h4><?= $response->voiture->marque ?></h4>

                <div class="info1-2">
                    <div class="info1">
                        <p>Model : <?= $response->voiture->model ?></p>
                        <p>Année : <?= $response->voiture->annee ?></p>
                        <p>Carburant : <?= $response->voiture->essence ?></p>
                        <p>Vitesse : <?= $response->voiture->vitesse ?></p>
                    </div>

                    <div class="info2">
                        <p>Siège : <?= $response->voiture->nombreSiege ?></p>
                        <p>Transmition : <?= $response->voiture->transmition ?></p>
                        <p>Porte : <?= $response->voiture->nombrePorte ?></p>
                        <p>Charge : <?= $response->voiture->nbMalette ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div>

            <form action="./ficheLocation.php" method="POST">

                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="nomClient">Nom Complet Client</label>
                        <input class="input input-2" type="text" name="nomClient" value="<?= $client->clientFound->nomComplet ?>" >
                    </div>

                    <div class="labelIput">
                        <label for="dateDebutLoc">Date Debut Location</label>
                        <input class="input input-2" type="date" name="dateDebutLoc" value="<?= $dateDebutLoc ?>" >
                        <!-- disabledo -->
                    </div>
                </div>


                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="adresseClient">Adresse Client</label>
                        <input class="input input-2" type="text" name="adresseClient" value="<?= $client->clientFound->adresse ?>" >
                    </div>

                    <div class="labelIput">
                        <label for="heureDebutLoc">Heure Debut Location</label>
                        <input class="input input-2" type="time" name="heureDebutLoc" value="<?= $heureDebutLoc ?>" >
                    </div>
                </div>

                <div class="global-labelIput">
                    <div class="labelIput">
                        <label for="mailClient">Email Client</label>
                        <input class="input input-2" type="mail" name="mailClient" value="<?= $client->clientFound->mail ?>" >
                    </div>

                    <div class="labelIput">
                        <label for="dateFinLoc">Date Fin Location</label>
                        <input class="input input-2" type="date" name="dateFinLoc" value="<?= $dateFinLoc ?>" >
                    </div>
                </div>

                <div class="global-labelIput">

                    <div class="labelIput">
                        <label for="noCompte">Pays De Ramassage</label>
                        <input class="input input-2" type="text" name="pays" value="<?= $pays ?>" >
                    </div>

                    <div class="labelIput">
                        <label for="heureFinLoc">Heure Fin Location</label>
                        <input class="input input-2" type="time" name="heureFinLoc" value="<?= $heureFinLoc ?>" >
                    </div>
                </div>

                <input type="hidden" name="idVtr" value="<?= $idVoiture ?> ">
                <input type="hidden" name="idClient" value="<?= $client->clientFound->id_client ?> ">
                <input class="btn" type="submit" name="confirmer" value="Valider">
            </form>
        </div>

        <script>
            function chageTypeInput() {
                var modePaiement = document.getElementById("modePaiement").value;
                if (modePaiement == 0) {
                    document.getElementById("moncash").classList.add("lbi");
                    document.getElementById("carte").classList.remove("lbi");

                    // document.getElementById("noCarte").add();
                    // document.getElementById("noCarteL").add();
                }
                else if (modePaiement == 1){
                    document.getElementById("moncash").classList.remove("lbi");
                    document.getElementById("carte").classList.add("lbi");
                    // document.getElementById("noCarteL").remove();

                    // document.getElementById("noCarte").add();
                    // document.getElementById("noCarteL").add();
                } 
            }
        </script>

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
        </div>
    </div>
    </div>
</body>

</html>