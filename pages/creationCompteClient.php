<?php
include('../autoLoad/autoLoader.php');

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
    $codeConnexion = rand(99999, 99999999) . '' . $maxId->maxId;

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smith Rent | Compte Client</title>
</head>

<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Creation Compte Client</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                             <input type="mail" name="mail" placeholder="Entrer votre l'email" required>
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Re-type Password" required />
                        </div>
                        <div class="row clearfix">
                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name" placeholder="Last Name" required />
                                </div>
                            </div>
                        </div>
                        <div class="input_field radio_option">
                            <input type="radio" name="radiogroup1" id="rd1">
                            <label for="rd1">Male</label>
                            <input type="radio" name="radiogroup1" id="rd2">
                            <label for="rd2">Female</label>
                        </div>
                        <div class="input_field select_option">
                            <select>
                                <option>Select a country</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                            </select>
                            <div class="select_arrow"></div>
                        </div>
                        <!-- <div class="input_field checkbox_option">
                            <input type="checkbox" id="cb1">
                            <label for="cb1">I agree with terms and conditions</label>
                        </div>
                        <div class="input_field checkbox_option">
                            <input type="checkbox" id="cb2">
                            <label for="cb2">I want to receive the newsletter</label>
                        </div> -->
                        <input class="button" type="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>