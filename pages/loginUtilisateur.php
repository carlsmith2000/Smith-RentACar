<?php
include('../autoLoad/autoLoader.php');
$controleurUtilisateur = new ControleurUtilisateurs();
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

$vueUtilisateur = new VueUtilisateurs();
$allUsers =  $vueUtilisateur->getAllUtilisateur();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <script src="../assets/Js/script.js"></script>
    <title>login</title>
</head>

<body>

<div class="topnav" id="myTopnav">
        <h1 class="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
        <div>
            <a class="" id="active" href="../index.php"> Accueil </a>
            <a class="linkOfM" href="./listeDesVoitures.php">Liste Des Voiture</a>
            <a class="linkOfM" href="./locationVoiture.php">Location</a>
            <a class="linkOfM" href="./rechercherVoiture.php">Rechercher</a>
            <a class="linkOfM" href="./chat.php">Chat</a>
            <a class="linkOfM" href="">Loisirs</a>
            <a class="linkOfM" href="./contact.php">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img class="fa fa-bars" src="./assets/img/menu_16x16.png" alt="">
            </a>
        </div>

    </div>
    <script type="text/javascript" src="./assets/Js/javaScript.js"></script>


    <?php
    if (isset($_POST['create'])) {
        $error = false;
        foreach ($allUsers as $user) {
            if ($_POST['users'] == $user->pseudo) {
                $message = 'Ce Pseudo est déjà pris';
                $error = true;
            }
        }
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $message = 'Entrer un Mot de passe que vous pouvez retenir';
            $error = true;
        }

        if (!$error) {
            if ($response = $controleurUtilisateur->enregistrerUtilisateur(
                $_POST['users'],
                $_POST['password']
            ) === 0) {
                $error = true;
                $message = 'Un probleme de serveur est survenu';
            } else {
    ?>
                <script>
                    alert('Creation Compte Avec Succès');
                </script>
    <?php
            }
        }
    }
    ?>

    <div class="cotn_principal">
        <div class="cont_centrar">

            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">

                            <h2>LOGIN</h2>
                            <p>Si vous avez déjà un Compte Utilisateur veyez connecter à ce Compte ici.</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>


                            <p>Si vous n'avez un Compte Utilisateur vous pouvez en creer un ici</p>

                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </div>
                    </div>
                </div>


                <div class="cont_back_info">
                    <div class="cont_img_back_grey">
                        <img src="../assets/img/20210602-FIAT-PULSE-02.jpg" alt="" />
                    </div>

                </div>
                <div class="cont_forms">
                    <div class="cont_img_back_">
                        <img src="../assets/img/20210602-FIAT-PULSE-02.jpg" alt="" />
                    </div>
                    <div class="cont_form_login">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>LOGIN</h2>
                        <form action="./loginUtilisateur.php" method="POST">
                            <input type="text" name="users" placeholder="User Name" />
                            <input type="password" name="password" placeholder="Password" />

                            <input type="hidden" name="id_utilisateur" value="<?= $id_utilisateur ?>">
                            <button class="btn_login" type="submit" name="connect" onclick="cambiar_login()">LOGIN</button>
                            <button class="btn_login" type="reset" name="reset">Reset</button>
                        </form>
                        <?php
                        if (isset($erroMsg)) {
                        ?>
                            <center>
                                <p style="color:red;">
                                    <?= $erroMsg ?>
                                </p>
                            </center>
                        <?php
                        }
                        ?>
                    </div>



                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>SIGN UP</h2>
                        <form action="./loginUtilisateur.php" method="POST">
                            <input type="text" name="users" placeholder="User Name" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" />
                            <button class="btn_sign_up" name="create" onclick="cambiar_sign_up()">SIGN UP</button>
                            <button class="btn_login" type="reset" name="reset">Reset</button>
                        </form>

                        <?php
                        if (isset($message)) {
                        ?>
                            <center>
                                <p style="color:red;">
                                    <?= $message ?>
                                </p>
                            </center>
                        <?php
                        }
                        ?>
                    </div>


                </div>

            </div>
        </div>
    </div>
</body>

</html>