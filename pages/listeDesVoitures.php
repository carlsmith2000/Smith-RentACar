<?php
    include_once('../autoLoad/autoLoader.php');

    $vuevoitures = new VueVoitures();
    $allVoiture =  $vuevoitures->getAllVoiture();

    echo '<pre>'; 
    print_r($allVoiture);
?>