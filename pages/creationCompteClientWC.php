<?php
    include('../autoLoad/autoLoader.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Smith | Login</title>
</head>

<body>
    <?php

$controleurClients = new ControleurClients();
$vueClient = new VueClients();
$maxId = $vueClient->maxIdClient()->maxId;

    if (isset($_POST['valider'])) {
        $nomComplet = $_POST['nom'];
        $age = $_POST['age'];
        $cin = $_POST['cin'];
        $dateExpirationPermis = $_POST['expPermis'];
        $numero = $_POST['telephone'];
        $mail = $_POST['mail'];
        $adresse = $_POST['adresse'];
        $codeConnexion = rand(99999, 99999999). ''. $maxId->maxId;

        $controleurClients->enregistrerClient(
            $nomComplet,
            $age,
            $cin,
            $dateExpirationPermis,
            $numero,
            $mail,
            $adresse,
            $codeConnexion
        );
    }
    ?>
    <div class="centerC">
        <h1>CREATION COMPTE CLIENT</h1>
        <form action="../pages/creationCompteClient.php" method="POST" class="formAjoutC">

            <div class="block_1">

                <div class="txt_input">
                    <div>
                        <label for="nom">Votre Nom Comple</label>
                        <input class="input" type="text" name="nom" placeholder="Entrer Votre Nom Complet" required>
                    </div>
                </div>

                <div class="txt_input">
                    <div>
                        <label for="prenom">Votre Email</label>
                        <input class="input" type="mail" name="mail" placeholder="Entrer votre l'email" required>
                    </div>
                </div>

                <div class="txt_input">
                    <div>
                        <label for="age">Entrer Votre Age</label>
                        <input class="input" type="text" name="age" placeholder="Entrer Votre Age" min=18 max=75 required>
                    </div>

                </div>

                <div class="txt_input">
                    <div>
                        <label for="cin">Votre CIN</label>
                        <input class="input" type="number" name="cin" placeholder="Entree Votre Adresse" required>
                    </div>
                </div>

                <div class="txt_input">
                    <div>
                        <label for="age"> la date d'expiration  Permis</label>
                        <input class="input" type="date" name="expPermis" placeholder="date exp Permis" required>
                    </div>
                </div>


                <div class="txt_input">
                    <div>
                        <label for="adresse">Votre Adresse</label>
                        <input class="input" type="text" name="adresse" placeholder="Entree Votre Adresse" required>
                    </div>
                </div>

                <div class="txt_input">
                    <div>
                        <label for="telephone">Entrer Votre Telephone</label>
                        <input class="input" type="text" name="telephone" placeholder="Entre Le no telephone du Client" required>
                    </div>
                </div>

            </div>

            <div class="btns">
                <div>
                    <input class="btn" type="submit" value="valider" name="valider">
                    <input class="btn" type="reset" value="Effacer" name="Effacer">
                </div>
            </div>
        </form>
    </div>
</body>

</html>