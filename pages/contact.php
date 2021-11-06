<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="styleContact.css">
    <link rel="stylesheet" href="../assets/css/styleContact.css">
    <link rel="stylesheet" href="../assets/css/Style1.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>

<body>

<div class="topnav" id="myTopnav">
        <h1 class="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
        <div>
            <a class="" id="active" href="../index.php"> Accueil </a>
            <a class="linkOfM" href="./listeDesVoitures.php">Liste Des Voiture</a>
            <a class="linkOfM" href="./locationVoiture.php">Location</a>
            <a class="linkOfM" href="./chat.php">Chat</a>
            <a class="linkOfM" href="">Loisirs</a>
            <a class="linkOfM" href="./contact.php">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img class="fa fa-bars" src="./assets/img/menu_16x16.png" alt="">
            </a>
        </div>

    </div>
    
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Contact Us</h2>
                <input type="text" class="field" placeholder="Your Name">
                <input type="text" class="field" placeholder="Your Email">
                <input type="text" class="field" placeholder="Phone">
                <input type="text" class="field" placeholder="Adresse">
                <textarea placeholder="Message" class="field"></textarea>
                <button class="btn">Send</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>

    <section>
        <footer class="foot">
            <h1 id="logo">SMITH<span class="s">'S</span> RENT CAR</h1>
            <div class="pied-Page">
                <div class="prod">
                    <h3>Produits</h3>
                    <ul>
                        <li><a href="">Pizza Margherita</a></li>
                        <li><a href="">Pizza Reine</a></li>
                        <li><a href="">Pizza Napolitaine</a></li>
                        <li><a href="">Pizza Capricciosa.</a></li>
                    </ul>
                </div>

                <div class="prod">
                    <h3>Service</h3>
                    <ul>
                        <li><a href="">Livraison</a></li>
                        <li><a href="">Reception</a></li>
                        <li><a href="">Preparation</a></li>
                        <li><a href="">Decoration</a></li>
                    </ul>
                </div>

                <div class="prod">
                    <h3>Information Legales</h3>
                    <ul>
                        <li><a href="">Histoire</a></li>
                        <li><a href="">Personnel</a></li>
                        <li><a href="">President Directeur</a></li>
                        <li><a href="">Fondateur</a></li>
                    </ul>
                </div>

                <div class="prod">
                    <h3>Suivez-nous</h3>
                    <ul class="icon-suivezNous">
                        <li>
                            <a href=""><img class="icon-s" id="tw" src="../assets/img/twitter-brands.svg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img class="icon-s" id="fb" src="../assets/img/facebook-brands.svg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img class="icon-s" id="yt" src="../assets/img/youtube-brands.svg" alt=""> </a>
                        </li>
                        <li>
                            <a href=""><img class="icon-s" id="it" src="../assets/img/instagram-brands.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="divP">

            </div>
            <p>©Copyright © 2021 SMITH<span class="s">'S</span> RENT CAR - Tous droits reservés</p>
        </footer>
    </section>


</body>

</html>