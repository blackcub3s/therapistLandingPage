
<?php
    include "header.html";
?>

<h1 class="text-center">Proves impressio fromulari TARGETA</h1>


<?php

    //camps que provenen del formulari de la targeta (cal prevalidarlos sigui amb bootgstarp o amb php)
    $nom_tarja = $_POST["nom_titular_targeta"];
    $numero_targeta = $_POST["numero_targeta"];
    $mes_tarja = $_POST["mes_tarja"];
    $any_tarja = $_POST["any_tarja"];
    $codi_csv = $_POST["codi_csv"];

    echo $nom_tarja;
    echo $numero_targeta;
    echo $mes_tarja;
    echo $any_tarja;
    echo $codi_csv;
?>

<h1 class="text-center">Proves impressio variables antigues del primer formulari</h1>

<?php
    echo $telefon;
?>

</body>
<?php include "footer.html"; ?>