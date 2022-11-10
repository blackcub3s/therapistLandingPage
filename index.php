<!doctype html>
<html lang="ca">
  <head>
    <meta name="robots" content="noindex" />    <!-- TREURE-HO -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Santi Sánchez Sans">
    <link rel="icon" href="favicon.ico">

    <title>Atenció psicològica immediata</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Per fer que surti el icono de whatsapp -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">



    <?php
    
        /*TOTES LES DADES D'AQUEST SCRIPT HAURIEN DE VENIR D'UN SERVIDOR [INICI]*/

        /*Aqui carreguem els preus de les sessions_PODRIES XUCLAR-LO PER UNA BASE DE DADES! I generar-les dinàmicament
        en funció de la demanda per exemple. Aixo no es veu al navegador xP. Podem definir diferents tarifes
        en funcio de la hora*/
        $preu_rapid = 5;
        $preu_mitja = 10;
        $preu_normal = 20;

        /*Si no hi ha psicolegs disponibles hem deshabilitat els pagaments. Aleshores oferim, de moment, 
        la ossibilitat per contactar telefonicament i concertar visita telefonica. Aleshores o bé es fa sistema
        per posar calendari (todo) i inhabilitar els pagaments en les hores concertades, o bé jo mateix passo el link
        per al paypal a cada persona i li concerto la visita, desactivant els pagaments per atenció immediata manualment */

      
        $host = "161.22.40.26"; //localhost o nom de servidor servername
        $username = "root";
        $passwd = "2244Motos.";
        $dbname = "web_psicoleg";

         
        //creo connexio i comprovo si ha anat be
        //$conn = new mysqli($host, $username, $passwd);
        /*
        if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
        echo "Connected successfully";

        //$sql = "SELECT tecla_disponible FROM psicolegs;";
        $sql = "CREATE DATABASE web_psicoleg;";
        $resultat = $conn->query($sql);

        */

        /*
        CODI PER A LA APP (permetra actualitzar l'estat ded disponible a NO disponible per a la persona amb deni 990)

         UPDATE psicolegs SET tecla_disponible = 0 WHERE dni = "99999999Y"; 
         UPDATE psicolegs SET tecla_disponible = 1 WHERE dni = "99999999Y"; 

        */
    
        $psicolegs_disponibles = true;

        //$conn->close();

        
        //rang hores de funcionament de la web (missatge especific de psicolegs dormen)
        $hora_minima = 0;
        $hora_maxima = 24;

        /*final de les dades que haurien de xuclar del servidor*/
        

        //mail ("dilapidant@gmail.com" , "Prova PHP" , "El cos del missatget");

        $hora = date('hour'); //STRING AMB di ai  hora
        $trossos = explode(" ", $hora); //trocejo la hora

        $dia_semana = substr($trossos[0],-4, strlen($trossos[0])); //Mon, Tue, Wed, ... m Sun, [SEMPRE TE UNA COMA AL FINAL SHIT]
        $temps_hh = explode(":",$trossos[4])[0];
        //$minut_hh = explode(":",$trossos[4])[1]; //no usat

        //SI ES CAP DE SETMANA PUJEM EL PREU UN 30 PER CENT
        if ($dia_semana == "Sat," or $dia_semana == "Sun," ) {
            $preu_rapid = round($preu_rapid * 1.30);
            $preu_mitja = round($preu_mitja * 1.30);
            $preu_normal = round($preu_normal * 1.30);
        }        
        
        //SI ESTEM FORA INTERVAL HORARI INHABILITEM LA WEB (WEB NOMES ACTIVA DE 9 A 23)
        if ($temps_hh < $hora_minima or ($temps_hh > $hora_maxima - 1)) {
            $psicolegs_disponibles = false;
            $psicolegs_dormen = true;
        }
    ?>

  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow ORIGEN ">
      <h5 class="my-0 mr-md-auto font-weight-normal">Acompanyamentemocional.cat</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#quiSoc">Qui som</a>
        <a class="p-2 text-dark" href="#serveis">Serveis</a>
        <a class="p-2 text-dark" href="#preus">Preus</a>
        <a class="p-2 text-dark" href="https://api.whatsapp.com/send?phone=34638512516&text=Voldria concertar una visita.">Contacte<i class="fa fa-whatsapp my-float p-2"></i></a>
      </nav>
    </div>


    <!--FER QUE FLOTI <a href="https://api.whatsapp.com/send?phone=34638512516&text=Voldria concertar una visita."><i class="fa fa-whatsapp"></i></a> -->








    <section id = "quiSoc">
        <div class="containerfluid presentacio">
            
                <div class = "container text-center">
                    <div class = "row">

                    <!-- Psicoleg 1 -->
                    <div class ="col-sm-12 padding_psicoleg">
                        <img src="./img/jo.png" title = "santiS" alt = "nocarrega" width = "300">
                        <h1 style="padding-top:50px;">Santiago Sánchez Sans</h1>
                        <ul>
                            <li>Psicòleg (UAB)</li>
                            <li>Màster investigació clínica (UAB)<br>-esp. analítica de dades-  </li>
                        </ul>
                    </div>

                    <!-- Psicoleg 2    [NOMES CAL CANVIAR EL 6 PER 12]
                    <div class ="col-sm-6 padding_psicoleg">
                        <img src="img/jo.png" title = "santiS" alt = "nocarrega" width = "50%">
                        <h1>Santiago Sánchez Sans</h1>
                        <ul>
                            <li>Psicòleg (UAB)</li>
                            <li>Màster en investigació clínica (UAB)</li>
                        </ul>
                    </div>
                    -->


                </div>
            </div>
        </div>
    </section>

    <!--linia torta difuminada-->
    <div id="container_tort_up_difuminat"></div>
    <!--linia torta-->
    <div id="container_tort_up"></div>

    <section id = "serveis">
        <div class="row">
            <div class = "container-fluid bg-warning seccio_serveis">
                <div class = "container">
                    <div class = "row">
                        
                        <div class = "col-md-4 text-center esquerra_a_dreta">
                            <!-- El logo telefon-->
                            <a href="#preus" style="color: inherit;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </a>
                            <!-- Text -->
                            <h1>Atenció telemàtica</h1>
                            <p class="posa_espai"> Et truquem per <b>telèfon o videotrucada</b> en qualsevol moment des de les <?php echo $hora_minima?> h a les <?php echo $hora_maxima?> h els 7 dies de la setmana. L'ajuda podem necessitar-la en qualsevol moment. </p>
                        </div>
                       
                        <div class = "col-md-4 text-center baix_a_dalt">
                            <!-- El logo de la careta-->
                            <a href="#preus" style="color: inherit;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                </svg>
                            </a>
                            <!-- Text -->
                            <h1>Preus competitius</h1>
                            <p class="posa_espai">Oferim tarifes competitives, de l'ordre d'entre 3 i 5 vegades més barates que la competència. L'atenció psicològica al sector privat actualment és un luxe, mentre que nosaltres creiem que és un dret i que hauria de ser accessible.</p>
                        </div>
                        
                        <div class = "col-md-4 text-center dreta_a_esquerra">
                            <!-- El logo de la careta-->
                            <a href="#preus" style="color: inherit;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tornado" viewBox="0 0 16 16">
                                    <path d="M1.125 2.45A.892.892 0 0 1 1 2c0-.26.116-.474.258-.634a1.9 1.9 0 0 1 .513-.389c.387-.21.913-.385 1.52-.525C4.514.17 6.18 0 8 0c1.821 0 3.486.17 4.709.452.607.14 1.133.314 1.52.525.193.106.374.233.513.389.141.16.258.374.258.634 0 1.011-.35 1.612-.634 2.102-.04.07-.08.137-.116.203a2.55 2.55 0 0 0-.313.809 2.938 2.938 0 0 0-.011.891.5.5 0 0 1 .428.849c-.06.06-.133.126-.215.195.204 1.116.088 1.99-.3 2.711-.453.84-1.231 1.383-2.02 1.856-.204.123-.412.243-.62.364-1.444.832-2.928 1.689-3.735 3.706a.5.5 0 0 1-.748.226l-.001-.001-.002-.001-.004-.003-.01-.008a2.142 2.142 0 0 1-.147-.115 4.095 4.095 0 0 1-1.179-1.656 3.786 3.786 0 0 1-.247-1.296A.498.498 0 0 1 5 12.5v-.018a.62.62 0 0 1 .008-.079.728.728 0 0 1 .188-.386c.09-.489.272-1.014.573-1.574a.5.5 0 0 1 .073-.918 3.29 3.29 0 0 1 .617-.144l.15-.193c.285-.356.404-.639.437-.861a.948.948 0 0 0-.122-.619c-.249-.455-.815-.903-1.613-1.43-.193-.127-.398-.258-.609-.394l-.119-.076a12.307 12.307 0 0 1-1.241-.334.5.5 0 0 1-.285-.707l-.23-.18C2.117 4.01 1.463 3.32 1.125 2.45zm1.973 1.051c.113.104.233.207.358.308.472.381.99.722 1.515 1.06 1.54.317 3.632.5 5.43.14a.5.5 0 0 1 .197.981c-1.216.244-2.537.26-3.759.157.399.326.744.682.963 1.081.203.373.302.79.233 1.247-.05.33-.182.657-.39.985.075.017.148.035.22.053l.006.002c.481.12.863.213 1.47.01a.5.5 0 1 1 .317.95c-.888.295-1.505.141-2.023.012l-.006-.002a3.894 3.894 0 0 0-.644-.123c-.37.55-.598 1.05-.726 1.497.142.045.296.11.465.194a.5.5 0 1 1-.448.894 3.11 3.11 0 0 0-.148-.07c.012.345.084.643.18.895.14.369.342.666.528.886.992-1.903 2.583-2.814 3.885-3.56.203-.116.399-.228.584-.34.775-.464 1.34-.89 1.653-1.472.212-.393.33-.9.26-1.617A6.74 6.74 0 0 1 10 8.5a.5.5 0 0 1 0-1 5.76 5.76 0 0 0 3.017-.872.515.515 0 0 1-.007-.03c-.135-.673-.14-1.207-.056-1.665.084-.46.253-.81.421-1.113l.131-.23c.065-.112.126-.22.182-.327-.29.107-.62.202-.98.285C11.487 3.83 9.822 4 8 4c-1.821 0-3.486-.17-4.709-.452-.065-.015-.13-.03-.193-.047zM13.964 2a1.12 1.12 0 0 0-.214-.145c-.272-.148-.697-.297-1.266-.428C11.354 1.166 9.769 1 8 1c-1.769 0-3.354.166-4.484.427-.569.13-.994.28-1.266.428A1.12 1.12 0 0 0 2.036 2c.04.038.109.087.214.145.272.148.697.297 1.266.428C4.646 2.834 6.231 3 8 3c1.769 0 3.354-.166 4.484-.427.569-.13.994-.28 1.266-.428A1.12 1.12 0 0 0 13.964 2z"/>
                                </svg>
                            </a>
                           
                           <!-- Text -->
                            <h1>Atenció immediata</h1>
                            <p class="posa_espai">Just després de que facis el pagament ens posarem en contacte amb tu i t'escoltarem. L'atenció psicològica al sector públic tarda mesos, i al sector privat dies. Nosaltres volem tractar de revertir aquesta dinàmica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--linia torta-->
    <div id="container_tort_down"></div>

    <div id="container_tort_down_difuminat"></div>


    <!--PREUS-->


    <section id = "preus" class = "seccio_serveis">


        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center ">
            <h1 class="display-4">Preus</h1>
            <hr>

        <!--PREUS A DISTANCIA -->
        
            <h2 class="display-5">atenció telefònica immediata</h2>
            <p class="lead">Contracta un dels plans seguents i ens posarem en contacte amb tu ràpidament per atendre't el temps que ens has demanat. 
            </p>
        </div>

        <form method="post">


        
        <div class="container fadein">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Consulta Ràpida</h4>
                </div>

                <!-- PREU CONSULTA RAPIDA-->
                <div class="card-body">
                    <h1 class="card-title pricing-card-title baix_a_dalt_1" id = "consultaRapida"><?php echo $preu_rapid . " €"?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                       
                        <li id = "temps-rapid" class = "text-success duradeta">15 minuts de durada</li>
                        <li class="dalt">Et contactem en<br> menys de 10'</li>
                        <li id = "preu-hora-rapida" class = "mig"></li> <!-- es genera automaticament a partir de h1 id=consulta rapida i ultim element de li amb id preu-horar-rapida-->                    
                    </ul>
                    <button onclick="bloca_element('consultaRapida');passa_pagos('Rapida'); passa_temps('rapid')" type="button" class="btn btn-lg btn-block btn-outline-primary" <?php if ($psicolegs_disponibles == false) { echo "disabled";}?>>Demana Cita</button>
                </div>
                </div>
                <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Consulta mitjana</h4>
                </div>

                <!--PREU CONSULTA MITJANA -->
                <div class="card-body">
                    <h1 class="card-title pricing-card-title baix_a_dalt_2" id = "consultaMitjana"><?php echo $preu_mitja . " €"?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li id = "temps-mitja" class = "text-success duradeta">30 minuts de durada</li>
                        <li class="dalt">Et contactem en<br> menys de 10'</li>
                        <li id = "preu-hora-mitjana" class = "mig"></li>
                    </ul>
                    
                    <button onclick="bloca_element('consultaMitjana'); passa_pagos('Mitjana'); passa_temps('mitja')" type="button" class="btn btn-lg btn-block btn-outline-primary" <?php if ($psicolegs_disponibles == false) { echo "disabled";}?>>Demana cita</button>
                </div>
                </div>
                <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Consulta normal</h4>
                </div>


                <!--PREU CONSULTA NORMAL-->
                <div class="card-body">
                    <h1 class="card-title pricing-card-title baix_a_dalt_3" id = "consultaNormal"><?php echo $preu_normal . " €"?></h1>

                    <div class="form-check">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li id = "temps-normal" class = "text-success duradeta">60 minuts de durada</li>
                        <li class="dalt">Et contactem en<br> menys de 30'</li>
                        <li id = "preu-hora-normal" class = "mig"></li>
                    </ul>
                   
                
                    <button onclick="bloca_element('consultaNormal'); passa_pagos('Normal'); passa_temps('normal')" type="button" class="btn btn-lg btn-block btn-outline-primary" <?php if ($psicolegs_disponibles == false) { echo "disabled";}?>>Demana cita</button>
                
                    
                    </div>

                    
                </div>
            </div>
        </div>

        </form>
        <?php
                    if ($psicolegs_disponibles == false) {
                        if (isset($psicolegs_dormen)) {
                            if ($psicolegs_dormen) {
                                echo '<div class="alert alert-danger" role="alert">'.
                                        '<p class="lead text-center"'.'<br><b>NOTA: Ara mateix el servei està fora del rang horari i no permetem fer pagaments. Si vols, demana cita telefònica clicant a l'.'icona'.
                                            ' <a href="https://api.whatsapp.com/send?phone=34638512516&text=Voldria concertar una visita."><i class="fa fa-whatsapp"></i></a>'
                                        . ' o espera'."'t a que obrim de nou l'aplicatiu informàtic. Funcionem des de les <b>" . $hora_minima . " h</b> fins a les <b>". $hora_maxima . " h</b>.</p>'"
                                    .'</div>';
                                }
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">'.
                                    '<p class="lead text-center"'.'<br><b>NOTA: Ara mateix no hi ha psicòlegs disponibles i no permetem fer pagaments. Si vols, demana cita telefònica clicant a l'.'icona'.
                                        ' <a href="https://api.whatsapp.com/send?phone=34638512516&text=Voldria concertar una visita."><i class="fa fa-whatsapp"></i></a>'
                                    . ' o espera'."'t a que obrim de nou l'aplicatiu informàtic.</b></p>"
                                .'</div>';
                        }
                    }

                    

                ?>
        <!-- form contacte distancia -->
        <div id="formContactePago" style="display:none">

            <form name = "formulari" method = "post" action = "codi/pagament.php">
                <p>Introduiu les vostres dades personals:</p>              
                
                <div class="form-group">
                    <input name = "nom" type="text" class="form-control" id="nom_persona" placeholder="Introduiu Nom">
                </div>
                <div class="form-group">
                  <input name = "correu" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduiu Correu electrònic">
                </div>
                <div class="form-group">
                  <input name = "telefon" required type="tel" class="form-control" id="telefon" placeholder="introduiu mòbil (9 dígits, sense espais)" pattern="[0-9]{9}">
                </div>



                
                <!-- camps calculats -->
                <div class="form-group">
                    <input name = "preu_escollit" type="text" class="form-control" id="preu-a pagar" disabled placeholder = "preu">
                    <small id="preu-sessio-sortida" class="form-text text-muted">Aquest és el preu de la sessió escollida.</small>
                </div>
                <div class="form-group">
                    <input name = "durada_sess_escollida" type="text" class="form-control" id="durada" disabled  placeholder = "duradaa">
                    <small id="temps-sessio-sortida" class="form-text text-muted">Aquesta és la durada de la sessió escollida.</small>
                </div>  

                <!-- politica privatitat dades (SI VULL QUE SURTI AL FINAL BEN POSADA NO LA PUC POSAR AL FINAL... RARO) -->
                <div class="form-check">
                    <input class="form-check-input" required type="checkbox" value="" id="checkPoliticaDades">
                    <label class="form-check-label" for="flexCheckDefault">
                        Accepto la política de privacitat de dades: <?php include "snippetProteccioDades.html"?>
                    </label>
                </div>

                <!-- camps invisibles sense disabled ni laceholder. aixi els pots passar pel post.-->
                <div class="form-group">
                    <input name = "preu_invisible_name" type="number" class="form-control" id="preu_invisible_name" style="display:none">
                </div>
                <!-- camps invisibles sense disabled ni laceholder. aixi els pots passar pel post.-->
                <div class="form-group">
                    <input name = "temps_invisible_name" type="number" class="form-control" id="temps_invisible_name" style="display:none">
                </div>
                





                <button type="submit" class="btn btn-primary">Sol·licita</button>
              </form>
        </div>
    </section>


    <section id = "preus_presencials">
        
        
        <!--Un div tort difuminat per dalt-->
        <div id="container_tort_up_2_difuminat" class = "bg-verdet"></div>
        <!--Un div tort per dalt-->
        <div id="container_tort_up_2" class = "bg-verdet"></div>


        <!--div intermig main-->
        <div class="row">
            <!--preus presencials-->
            <div class = "container-fluid bg-verdet" id="afegeix_padding_per_dalt_i_baix">
                    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                        <h1 class="display-5 fadein">Atenció presencial</h1>
                        <p class="lead">Hores a convenir, oficines lleida. Truca'ns o escriu-nos per whatsapp: <a href="https://api.whatsapp.com/send?phone=34638512516&text=Voldria concertar una visita."><i class="fa fa-whatsapp"></i></a>.</p>
                        <p class="lead"><b><i><u>(30 €/h)</u></i></b></p>
                    </div>
            </div>
        </div>

        <div id="container_tort_down_2" class = "bg-verdet"></div>
        <div id="container_tort_down_2_difuminat" class = "bg-verdet"></div>

    </section>




        
    

    
    <!--contactar-->
   
    <section id = "contactar">
        <div class="container-fluid ASD text-center">
            <div class="container">
                <h1 class="display-5">Contacta directament amb nosaltres</h1>
                <p> Si has tingut algun problema amb el sistema de pagament o vols tenir una primera 
                    presa de contacte amb mi abans de pagar pots trucar sense compromís a 
                    aquest número de telèfon: <img src = "img/telefon_meu.PNG" alt = "No hi ha imatge" id="imatge_telefon" style="width:8rem">, o
                    escriure'm clicant damunt el mail següent:
                    <a href = "mailto:santiago.sanchez.sans.44@gmail.com?subject=Problema"> 
                    <img src = "img/mail_meu.PNG" alt ="no hi es" style="width:25rem" class = "imatge_hover"></a></p>
            </div>
        </div>
    </section>

    
      <footer class="pt-5 pt-md-5 border-top bg-warning venga">
            
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3">
                        <small class="d-block mb-3 text-muted">&copy; Web developer: <br> Santiago Sánchez Sans | 2021</small>
                    </div>
                    <!-- dummie espai-->
                    <div class="col-6 align-self-center"></div>

                    <div class="col-3 align-self-center">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#quiSoc">Equip</a></li>
                        <li><a class="text-muted" href="#">Oficines</a></li>
                        <li><a class="text-muted" href="#">Privacitat</a></li>
                        <li><a class="text-muted" href="./login/login.php">Àrea privada</a></li>
                        </ul>
                    </div>
                </div>
            </div>
      </footer>
    

    <!-- Bootstrap core JavaScript
    ================================================== 
    Placed at the end of the document so the pages load faster -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
    
    <!-- els meus scripts -->
    <script src="codi/script-meu.js"></script>
    <script src="codi/finestra_pagament.js"></script>





  


    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>

    <!-- per fer les animacions de Scroll reveal i fer que apareguin elements
    OJO QUE ES UN CUELLO DE BOTELLA. NECESSITES FER NPM INSTALL NO SE SI AL SERVIDOR O ON POLLES SIGUI
    -->
    <script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>
    <script>
        window.sr = ScrollReveal({ reset: false });
        
        sr.reveal('.dreta_a_esquerra', {opacity: 0.8, duration:1000, origin:"right", distance: "100px", delay:0});
        sr.reveal('.esquerra_a_dreta', {opacity: 0.8, duration:1000, origin:"left", distance: "100px", delay:0});
        sr.reveal('.baix_a_dalt', {opacity: 0.8, duration:1000, origin:"bottom", distance: "100px", delay:0});
        

        sr.reveal('.baix_a_dalt_1', {opacity: 0.1, duration:1000, origin:"top", distance: "20px", delay:50});
        sr.reveal('.baix_a_dalt_2', {opacity: 0.1, duration:1000, origin:"top", distance: "20px", delay:400});
        sr.reveal('.baix_a_dalt_3', {opacity: 0.1, duration:1000, origin:"top", distance: "20px", delay:750});
        
        sr.reveal('.fadein', {duration:1500, opacity: 0.7, distance: "0px", delay:300});


    </script>


      <!--perque es vegi el modal en apretar el boto de trigger -->
    <script>
        function mostraModal() {
            $('#elModalDeLesDades').appendTo("body").modal('show');
        }
    </script>

  </body>
</html>
