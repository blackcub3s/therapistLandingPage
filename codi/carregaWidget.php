<?php include "header.html" ?>


    <!--TRACTE PERSONALITZAT AL NOM -->
    
    
        <div class="container">
            <?php
                if (!isset($nom)) {
                    echo "<p class = 'text-center display-4'><b> Hola!" . "</b></p>";
                }
                else {
                    echo "<p class = 'text-center display-4'><b> Hola, " . $nom . "!</b></p>";
                }
                // definim una alerta

            ?>

            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert" id="banner_alerta">
                <strong>Ei!</strong> Abans de fer el pagament comprova que el teu número es correcte: <?php echo '<strong>'.$telefon . "</strong>." ?>
                        En cas contrari, torna al formulari i canvia'l.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="oculta()">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>




<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center dins_a_fora" >
            <div class="container" style="border-radius:6px; border-style:solid; border-width: 2px; margin-bottom:15px;">
                <h1>Facturació</h1>
                <h2 id="text_pagament" style="padding-top: 1rem; padding-bottom: 5px; font-size:30px;"><i>Mètode de pagament</i></h2>
                <form>

                    <div class="pagament" style="padding-bottom:10px;">
                                
                                <div class="form-check form-check-inline" id = "paypal">
                                    <input required class="form-check-input" type="radio" name="radio_pagament" id="radio_paypal" value="1" onclick="ShowHideDiv()">
                                    <label class="form-check-label" for="radio_paypal"><img src="img/thumbnailpaypalet.PNG" alt="No img pay" width="90"></label>
                                </div>
                                <div class="form-check form-check-inline" id = "tarja">
                                    <input required class="form-check-input" type="radio" name="radio_pagament" id="radio_targeta" value="2" onclick="ShowHideDiv()">
                                    <label class="form-check-label" for="radio_targeta"><img src="img/thumbnailtargeta.PNG" alt="No img pay" width="100"></label>
                                </div>       
                    </div>
                </form>




                <div id="boto_paypal" style="display: none; padding-bottom: 10px;">
                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

                    <div id="paypal-button"></div>

                    <script>
                    paypal.Button.render({
                        env: 'sandbox', // Or 'production'
                        // Set up the payment:
                        // 1. Add a payment callback FUNCTION
                        payment: function(data, actions) {
                        // 2. Make a request to your server
                        return actions.request.post('/my-api/create-payment/')
                            .then(function(res) {
                            // 3. Return res.id from the response
                            return res.id;
                            });
                        },
                        // Execute the payment:
                        // 1. Add an onAuthorize callback
                        onAuthorize: function(data, actions) {
                        // 2. Make a request to your server
                        return actions.request.post('/my-api/execute-payment/', {
                            paymentID: data.paymentID,
                            payerID:   data.payerID
                        })
                            .then(function(res) {
                            // 3. Show the buyer a confirmation message.
                            });
                        }
                    }, '#paypal-button');
                    </script>

                </div>



 

                <div id="formulari_targeta" style="display:none; padding-bottom: 20px;"> <!-- PUTO BOOTSTRAP... M'obliga afer servir inline style tota l'estona TT. Ni a stackoverflow es soluciona.-->
                    <button type="button" class="btn btn-warning">Paga amb targeta</button>
                </div>
            </div>
        </div>



    <div class="col-sm-6 dins_a_fora_tarda" style="margin-bottom: 15px;" >

        <div class="card text-center col-mg-6 bg-light" style="height:100%;">
            <div class="card-header">
                            Carta de pagament
            </div>
            <div class="card-body" >
                            <!-- PREU CONTRACTAT -->
                            <p class="card-title ">                            
                                <?php 
                                    echo  "Preu sessio escollida: <b>" .  $calers . " €</b>"; //AIXO CAL VIGILAR-HO AVIAM SI FUNCIONARA. I CAL OCULTAR CAMPS
                                ?>
                            </p>

                            <!-- TEMPS CONTRACTAT -->
                            <p class="card-text">
                                <?php 
                                    echo  "Temps sessió escollida: <b>" . $temps_contractat . " minuts.</b>"; //AIXO CAL VIGILAR-HO AVIAM SI FUNCIONARA. I CAL OCULTAR CAMPS
                                ?>
                            </p>
        
            </div>

        </div>

    </div>
</div>


<!-- per fer les animacions de Scroll reveal i fer que apareguin elements
OJO QUE ES UN CUELLO DE BOTELLA. NECESSITES FER NPM INSTALL NO SE SI AL SERVIDOR O ON POLLES SIGUI
 -->
<script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>
    
<script>
        window.sr = ScrollReveal({ reset: true });
        
        sr.reveal('.dins_a_fora', {opacity: 0.8, duration:1100, origin:"top", distance: "10px", delay:0});
        sr.reveal('.dins_a_fora_tarda', {opacity: 0.8, duration:1100, origin:"top", distance: "10px", delay:100});

    </script>
