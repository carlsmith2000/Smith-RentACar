<?php
include('../autoLoad/autoLoader.php');

$controleurClients = new ControleurClients();
$vueClient = new VueClients();
$maxId = $vueClient->maxIdClient()->maxId;

if (isset($_POST['valider'])) {
    $nomComplet = $_POST['name'] . ' ' .  $_POST['lastName'];
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
?>
    <script>
        var num = "<?php echo $codeConnexion; ?>"
        alert(num+" Est votre numero de Compte Client, à ne pas Oublier SVP !");
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleRegister.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
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
                    <form action="../pages/creationCompteClient.php" method="POST">

                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" name="mail" placeholder="Entrer votre l'email" required>
                        </div>

                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="text" name="telephone" placeholder="Entre Le no telephone du Client" required>
                        </div>

                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="text" name="adresse" placeholder="Entrer Votre Adresse" required>
                        </div>

                        <div class="row clearfix">

                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name" placeholder="First Name" />
                                </div>
                            </div>

                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="lastName" placeholder="Last Name" required />
                                </div>
                            </div>

                        </div>

                        <div class="input_field">
                            <input type="number" name="age" placeholder="Entrer Votre Age" min=18 max=75 required>
                        </div>

                        <div class="input_field">
                            <input type="number" name="cin" placeholder="Entree Votre CIN" required>
                        </div>

                        <div class="input_field">
                            <input type="date" name="expPermis" placeholder="date exp Permis" required>
                        </div>

                        <input class="button" type="submit" value="Valider" name="valider" />
                        <input class="button" type="reset" value="Effacer" name="effacer" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>