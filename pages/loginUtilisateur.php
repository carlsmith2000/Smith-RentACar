<?php
include('../autoLoad/autoLoader.php');
// $controleurUtilisateur = new ControleurUtilisateurs();
$vueUtilisateur = new VueUtilisateurs();
$allUtilisateur = $vueUtilisateur->getAllUtilisateur();
$vueChat = new VueMiniChat();

if (isset($_POST['connect'])) {
    $response = $vueChat->canConnectUser($_POST['users'], $_POST['password']);
    if ($response->userFind) {
        session_start();
        $_SESSION['utilisateurs'] = $response->utilisateur;
        header('location: ./chat.php');
    } else {
        $erroMsg = 'Pseudo ou Mot de passe Incorrect';
    }
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
    <title>SMITH RENT | LOGIN CHAT</title>
</head>

<body class="bodyLogin">
    <div class="topnav" id="myTopnav">
        <h1 class="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
        <div>
            <a class="" id="active" href="../index.php"> Accueil </a>
            <a class="linkOfM" href="./listeDesVoitures.php">Liste Des Voiture</a>
            <a class="linkOfM" href="./locationVoiture.php">Location</a>
            <a class="linkOfM" href="./chat.php">Chat</a>
            <a class="linkOfM" href="contact.html">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img class="fa fa-bars" src="./assets/img/menu_16x16.png" alt="">
            </a>
        </div>

    </div>
    <div class="center">
        <!-- <div class="borderB"><img src="../../assets/IMG/userOk.png" alt=""></div> -->
        <center>
            <h1 style="color: rgb(16, 55, 105); padding:1rem;">Sign in</h1>
        </center>
        <form action="./loginUtilisateur.php" method="POST" class="form">

            <div class="txt_input">
                <input class="inputUsers" type="text" name="users" placeholder="users Name">
            </div>

            <div class="txt_input">
                <input class="inputPassword" type="password" name="password" placeholder="Password">
            </div>
            <input type="hidden" name="id_utilisateur" value="<?= $id_utilisateur ?>">
            <div class="allBtn">
                <input class="btn" type="submit" name="connect" value="Login">
                <input class="btn" type="reset" name="reset" value="Reset">
            </div>

            <?php
            if (isset($erroMsg)) {
            ?>
                <center>
                    <p style="color:red;"><?= $erroMsg ?></p>
                </center>
            <?php
            }
            ?>

            <div class="link_create_account">
                <a class="link_create" href="./compteUtilisateur.php">creer un Compte &rarr;</a>
            </div>
        </form>
    </div>
   
</body>

</html>