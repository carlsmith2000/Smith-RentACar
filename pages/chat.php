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
    $message = $_POST['message'];
    $dateDenvoi = $dt->format("Y-m-d");
    $heureDenvoi = $dt->format("h:i:s");
    $controleurChat->envoyerMessages($id_utilisateur,  $message,  $dateDenvoi, $heureDenvoi);
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
                if ($user->statut == 1) {
            ?>
                    <p class="user"><strong class="strong"><?= $user->pseudo[0] ?></strong> <?= $user->pseudo ?><small id="sl">w</small></p>
                <?php
                } else {
                ?>
                    <p class="user"><strong class="strong"><?= $user->pseudo[0] ?></strong> <?= $user->pseudo ?><small></small></p>
            <?php
                }
            }
            ?>
        </div>

        <div class="message">
            <?php
            $allMessages = $vueChat->alleMessage();
            foreach ($allMessages as $message) {
                if ($message->id_utilisateurs == $_SESSION['utilisateurs']->id_utilisateur) {
                ?>
                    <div class="distincMessage">
                        <p class="curent"><?= $message->message ?> <small><?= $message->heureDenvoi ?></small></p><br>
                    <?php
                } else {
                    ?>
                        <p class="auther"><?= $message->message ?> <small><?= $message->heureDenvoi ?></small></p><br>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <div class="inputMessage">
            <form action="./chat.php" method="POST">
                <input class="msg" type="text" name="message" placeholder="Message">
                <input class="btnSend" type="submit" value="Envoyer" name="send">
            </form>
        </div>

    </div>
</body>

</html>