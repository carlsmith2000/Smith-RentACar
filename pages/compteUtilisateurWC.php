<?php
include('../autoLoad/autoLoader.php');
$controleurUtilisateur = new ControleurUtilisateurs();
$vueUtilisateur = new VueUtilisateurs();
$allUsers =  $vueUtilisateur->getAllUtilisateur();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Create Acount</title>
</head>

<body>
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
    <div class="center">
        <h1>Sign Up</h1>
        <form action="./compteUtilisateur.php" method="POST" class="form">

            <div class="txt_input">
                <input class="inputUsers" type="text" name="users" placeholder="users Name" required>
            </div>

            <div class="txt_input">
                <input class="inputPassword" type="password" name="password" placeholder="Password" required>
            </div>

            <div class="txt_input">
                <input class="inputPassword" type="password" name="confirmPassword" placeholder="Confirm Your Password" required>
            </div>

            <div class="allBtn">
                <input class="btn" type="submit" name="create" value="Create">
                <input class="btn" type="reset" name="reset" value="Reset">
            </div>

            <?php
            if (isset($message)) {
            ?>
                <center>
                    <p style="color:red;"><?= $message ?></p>
                </center>
            <?php
            }
            ?>

            <div class="link_create_account">
                <a class="link_create" href="./loginUtilisateur.php">J'ai déjà Compte &rarr;</a>
            </div>
        </form>
    </div>
</body>

</html>