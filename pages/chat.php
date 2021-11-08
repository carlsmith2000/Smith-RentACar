<?php
include('../autoLoad/autoLoader.php');

session_start();
if (!isset($_SESSION['utilisateurs'])) {
    header('location: ./loginUtilisateur.php');
}

$dtz = new DateTimeZone("America/Toronto");
$dt = new DateTime('now', $dtz);

$controleurChat = new ControleurMinichat();
$controleurUtilisateur = new ControleurUtilisateurs();
$vueUtilisateur = new VueUtilisateurs();

$vueChat = new VueMiniChat();

$allMessages = $vueChat->alleMessage();
$users = $vueUtilisateur->getAllUtilisateur();
$testOnline = $controleurUtilisateur->updateStatuts($_SESSION['utilisateurs']->id_utilisateur, 1);

if (isset($_POST['send'])) {
    $id_utilisateur = $_SESSION['utilisateurs']->id_utilisateur;
    $message = htmlspecialchars(stripslashes($_POST['message']));

    if (!empty($message)) {
        $dateDenvoi = $dt->format("Y-m-d");
        $heureDenvoi = $dt->format("h:i:s");
        $controleurChat->envoyerMessages($id_utilisateur,  $message,  $dateDenvoi, $heureDenvoi);
    }
}

if (isset($_POST['logout'])) {
    $controleurUtilisateur->updateStatuts($_SESSION['utilisateurs']->id_utilisateur, 0);
    header('location: ./loginUtilisateur.php');
    unset($_SESSION['utilisateurs']);
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleChat.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- <script src="./script.js"></script> -->
    <title>tchat</title>
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

    <div class="container clearfix">
        <div class="people-list" id="people-list">
            <div class="search">
                <form action="./chat.php" method="post">
                    <input type="text" placeholder="search" />
                    <i class="fa fa-search"></i>

                </form>
            </div>

            <ul class="list">
                <?php
                foreach ($users as $user) {
                    if ($user->id_utilisateur != $_SESSION['utilisateurs']->id_utilisateur) {
                        if ($user->statut == 1) {
                ?>
                            <li class="clearfix">
                                <img src="../assets/img/icons8-user-48.png" alt="avatar" />
                                <div class="about">
                                    <div class="name"><?= $user->pseudo ?></div>
                                    <div class="status">
                                        <i class="fa fa-circle online"></i> En Ligne
                                    </div>
                                </div>
                            </li>
                        <?php

                        } else {
                        ?>
                            <li class="clearfix">
                                <img src="../assets/img/icons8-user-48.png" alt="avatar" />
                                <div class="about">
                                    <div class="name"><?= $user->pseudo ?></div>
                                    <div class="status">
                                        <i class="fa fa-circle offline"></i> Hors ligne
                                    </div>
                                </div>
                            </li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <!-- Utilisateur connecter -->
        <div class="chat">
            <div class="chat-header clearfix">
                <img src="../assets/img/icons8-user-48.png" alt="avatar" />

                <div class="chat-about">
                    <form action="./chat.php" method="POST">
                        <div class="disconnect-div">
                            <div class="chat-with">
                                <?= $_SESSION['utilisateurs']->pseudo ?>
                            </div>
                            <input class="disconnect" type="submit" name="logout" value="Deconnection">
                        </div>
                        <!-- <div class="chat-num-messages">already 1 902 messages</div> -->
                    </form>
                </div>
                <i class="fa fa-star"></i>
            </div>
            <!-- end chat-header -->

            <div class="chat-history">
                <ul>
                    <?php
                    $allMessages = $vueChat->alleMessage();
                    foreach ($allMessages as $message) {
                        if ($message->id_utilisateurs == $_SESSION['utilisateurs']->id_utilisateur) {
                    ?>
                            <li class="clearfix">
                                <div class="message-data align-right">
                                    <span class="message-data-time"><?= $message->heureDenvoi ?>, <?= $message->dateDenvoi ?></span> &nbsp; &nbsp;
                                    <span class="message-data-name"><?= $message->pseudo ?></span> <i class="fa fa-circle me"></i>

                                </div>
                                <div class="message other-message float-right">
                                    <?= $message->message ?>
                                </div>
                            </li>
                        <?php
                        } else {

                        ?>
                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> <?= $message->pseudo ?></span>
                                    <span class="message-data-time"><?= $message->heureDenvoi ?>, <?= $message->dateDenvoi ?></span>
                                </div>
                                <div class="message my-message">
                                    <?= $message->message ?>
                                </div>
                            </li>
                    <?php
                        }
                    } ?>
                </ul>

            </div>
            <!-- end chat-history -->

            <div class="chat-message clearfix">
                <form action="./chat.php" method="post">
                    <textarea name="message" id="message-to-send" placeholder="Type your message" rows="3"></textarea>
                    <button type="submit" name="send">Send</button>
                </form>

            </div>


        </div>

    </div>

</body>

</html>