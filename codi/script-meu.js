///////
// AQUEST CODI CALCULA EL PREU PER HORA DELS CONTAINERS DE PREU A PARTIR DELS VALORS
// INTRODUITS A LA LLISTA DE L'HTML PER ALS DOS PRIMERS CONTAINERS (RAPIDA I MITJA)
// També fem finaitat ***
//////




//funcio que torna l'index del simbol s en una cadena de text
function localitza_simbol(s, text) {
    for (var i = 0; i < text.length; ++i) {
        if (text[i] === s) {
            return i;
        }
    }
}


//AQUEST CODI S'APLICA AL CONTENIDOR DE CONSULTA RAPIDA
    //ojo, que aqui  document.getElementById("consultaRapida") no anava
var text_dins_h1_barat = document.querySelector("#consultaRapida").textContent; ////"5€ / sess trobo euro:
var preu_total_barat = text_dins_h1_barat.slice(0, [localitza_simbol("€", text_dins_h1_barat)]).trim();//AGAFO NOMÉS EL NUMERO 5
var minuts_rapid = document.querySelector("#temps-rapid").textContent.slice(0,[2]).trim(); //poso el preu per hora de forma automàtica

preu_barat = eval(preu_total_barat)*60/parseInt(minuts_rapid); //calculo preu
document.getElementById("preu-hora-rapida").innerHTML = "<i><u>" +" ("+String(preu_barat) + " €/h)" + "</i></u>";//introdueixo a lultim el de la llista


//AQUEST CODI S'APLICA AL CONTENIDOR DE CONSULTA MITJANA
   
var text_dins_h1_mig = document.querySelector("#consultaMitjana").textContent; ////"5€ / sess trobo euro:
var preu_total_mig = text_dins_h1_mig.slice(0, [localitza_simbol("€", text_dins_h1_mig)]).trim();//AGAFO NOMÉS EL NUMERO 5
var minuts_mig = document.querySelector("#temps-mitja").textContent.slice(0,[2]).trim(); //poso el preu per hora de forma automàtica

preu_mig = eval(preu_total_mig)*60/parseInt(minuts_mig); //calculo preu
document.getElementById("preu-hora-mitjana").innerHTML = "<i><u>" +" ("+String(preu_mig) + " €/h)" + "</i></u>";//introdueixo a lultim el de la llista
    


//AQUEST CODI S'APLICA AL CONTENIDOR DE CONSULTA NORMAL

var text_dins_h1_normal = document.querySelector("#consultaNormal").textContent; ////"5€ / sess trobo euro:
var preu_total_normal = text_dins_h1_normal.slice(0, [localitza_simbol("€", text_dins_h1_normal)]).trim();//AGAFO NOMÉS EL NUMERO 5
var minuts_normal = document.querySelector("#temps-normal").textContent.slice(0,[2]).trim(); //poso el preu per hora de forma automàtica

preu_mig = eval(preu_total_normal)*60/parseInt(minuts_normal); //calculo preu
document.getElementById("preu-hora-normal").innerHTML = "<i><u>" +" ("+String(preu_mig) + " €/h)" + "</i></u>";//introdueixo a lultim el de la llista
    






////////    
//poso el preu al formulari disabled a partir de la informacio continguda en l'html (cridadda a bloca_element())
function posa_preu_a_formulari(id) {
    if (id === "consultaRapida") {
        document.getElementById("preu-a pagar").placeholder = text_dins_h1_barat;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu
        document.getElementById("durada").placeholder = document.querySelector("#temps-rapid").textContent;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
        

        document.getElementById("preu_invisible_name").value = preu_total_barat;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
        document.getElementById("temps_invisible_name").value = minuts_rapid;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
        
    }
    else if (id === "consultaMitjana") {
        document.getElementById("preu-a pagar").placeholder = text_dins_h1_mig;  //pots posar preu_total_barat en comptes de texrt_dins_h1_mig_per obtenir nomes el nre del preu
        document.getElementById("durada").placeholder = document.querySelector("#temps-mitja").textContent;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
    
        document.getElementById("preu_invisible_name").value = preu_total_mig;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
        document.getElementById("temps_invisible_name").value = minuts_mig;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 


    }
    else if (id === "consultaNormal") { //cas consulta normal
        document.getElementById("preu-a pagar").placeholder = text_dins_h1_normal;  //pots posar preu_total_barat en comptes de texrt_dins_h1_mig_per obtenir nomes el nre del preu
        document.getElementById("durada").placeholder = document.querySelector("#temps-normal").textContent;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
   
        document.getElementById("preu_invisible_name").value = preu_total_normal;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 
        document.getElementById("temps_invisible_name").value = minuts_normal;  //pots posar preu_total_barat en comptes de text_dins_h1_barat per obtenir nomes el nre del preu 

    }
}


//STACKOVERFLOW <3
////AQUEST CODI S'APLICA PER FER SORTIR EL FORMULARI DE PAGO (està amagat amb display:block)
//tambe se'n va a la vist adel formulari.
// I FINALMENT CALCULA DADES DE CONTACTE QUAN L'USUARI CLICA UN DELS BOTONS DE "ACCEDEIX A PAGAMENT"

function bloca_element(id) {
    var T = document.getElementById("formContactePago");
    T.style.display = "block";  // fa que el display:none deixi de no mostrarse
    posa_preu_a_formulari(id); //posa els euros la hora
    
    T.scrollIntoView({behavior: 'smooth'});
}

function mou_a_preus() {
    T2.scrollIntoView({behavior: 'smooth'});
}

console.log("heyyy");

