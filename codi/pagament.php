<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    //CAMPS INTRODUITS PER USUARI
    $nom = $_POST["nom"]; //CAMP NO REQUERIT. POT ESTAR BUIT!
    $correu = $_POST["correu"];
    $telefon = $_POST["telefon"];

    //CAMPS CALCULATS (ENTERS)
    $calers = $_POST["preu_invisible_name"]; //<---------
    $temps_contractat = $_POST["temps_invisible_name"]; //ULTRAIMPORTANT PER PASSAR <---------

    
    $calers = $calers . "";   //ULTRA IMPORTANT PER PASSSAR A LA CARTA DE PAGO DE PAYPAL <-----
    $temps_contractat = $temps_contractat . ""; //converteido a string
    

    

    //CAMPS CALCULATS (PREVIAMENT ESCOLLITS EN ESCOLLIR LES CARDS CONCRETES).
    //SON IMPASSABLES! NO PUC PASSAR-LOS COM VALUES, I TMAPOC COM PLACEHOLDERS. PUTA VIDA.
    //$durada_sessio = $_POST["durada_sess_escollida"]; 
    //$preu_escollit = $_POST["preu_escollit"];
    
    //DECIDIM A QUINA FINESTRA DE PAGAMENT ANEM


    include "carregaWidget.php"; //posa el container d'avís.


    include "footer.html"; //inclou el javascript
    //Es impossible xuclar els camps que son camps calculats (xuclo els camps introduits per l'usuari)
    
    //echo "<p> Metode pago --> " . $metode_pago . "</p>";
    //echo "<p> durada sessio --> " . $durada_sessio. "</p>";
    //echo "<p> preu escollit --> " . $preu_escollit . "</p>";



?>


</body>

</html>