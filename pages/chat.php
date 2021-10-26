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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>SMITH RENT CAR | LIVE CHAT</title>
</head>
<?php
if (isset($_POST['send'])) {
    $id_utilisateur = $_SESSION['utilisateurs']->id_utilisateur;
    $message = htmlspecialchars(stripslashes($_POST['message']));

    if(!empty($message)){
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

<body>
    <div class="curentUser">
        <form action="./chat.php" method="POST">
            <div class="disconnect-div">
                <strong><?= $_SESSION['utilisateurs']->pseudo ?></strong>
                <input class="disconnect" type="submit" name="logout" value="Deconnection">
            </div>
        </form>
    </div>

    <div class="chat">

        <div class="utilisateur">
            <?php
            foreach ($users as $user) {
                if ($user->id_utilisateur != $_SESSION['utilisateurs']->id_utilisateur) {
                    if ($user->statut == 1) {
            ?>
                        <div class="user-online">
                            <p class="user"><strong class="strong"><?= $user->pseudo[0] ?></strong> <?= $user->pseudo ?></p>
                            <small class="enLigne">En ligne</small>
                            <div id="online"></div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="user-online">
                            <p class="user"><strong class="strong"><?= $user->pseudo[0] ?></strong> <?= $user->pseudo ?></p>
                            <small class="enLigne">Hors ligne</small>
                            <div id="Horsligne"></div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
        <div class="globalmessage">
            <div class="message">
                <?php
                $allMessages = $vueChat->alleMessage();
                foreach ($allMessages as $message) {
                    if ($message->id_utilisateurs == $_SESSION['utilisateurs']->id_utilisateur) {
                ?>
                        <!-- <div class="distincMessage"> -->
                        <p class="curent"><?= $message->message ?> <small id="time"><?= $message->heureDenvoi ?></small></p>
                    <?php
                    } else {
                    ?>
                        <p class="auther"><?= $message->message ?><br><small id="time"><?= $message->heureDenvoi ?></small></p>
                        <!-- </div> -->

                <?php
                    }
                }
                ?>

            </div>
        </div>



        <div class="inputMessage">
            <form action="./chat.php" method="POST">
            <textarea class="msg" type="ar" name="message" placeholder="Message" id="" cols="30" rows="20"></textarea>
                <!-- <input class="msg" type="ar" name="message" placeholder="Message"> -->
                <input class="btnSend" type="submit" value="Envoyer&rarr;" name="send">
            </form>
        </div>

    </div>
</body>

</html>