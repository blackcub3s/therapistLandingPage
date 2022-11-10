//tipusPago es Normal, Mitjana o Rapida. Serveix per seleccionar la variable mes recent clicada
//i passar els pagos i el temps a la següent finestraa per a fer els pagos



//funcio que torna l'index del simbol s en una cadena de text
function localitza_simbol(s, text) {
    for (var i = 0; i < text.length; ++i) {
        if (text[i] === s) {
            return i;
        }
    }
}

//FUNCIO QUE AGAFA ELS DINERS DE LA VISITA, EN SELECCIONAR EL BOTO "DEMANACITA" de index html.
function passa_pagos(tipusPago) {
    //faig calers variable global (no uso var)
    calers = document.querySelector("#consulta"+tipusPago).textContent; ////"5€ / sess trobo euro:
    calers = calers.slice(0, [localitza_simbol("€", calers)]).trim();//AGAFO NOMÉS EL NUMERO 5
   observa_pago();
    
}

//FUNCIO QUE AFAFA EL TEMPS DE LA VISITA, EN SELECCIONAR QUALSEVO DELS BOTONS "Demana cita" de index html.
function passa_temps(temps) {
    durada = document.querySelector("#temps-"+temps).textContent.slice(0,[2]).trim();
    observa_temps();
}

