var container = document.createElement("DIV");
var id_button = ["btnEens", "btnOneens", "btnVolgende"]
var button_text = ["EENS", "ONEENS", "VOLGENDE"]
var grid_container = document.getElementsByClassName("grid")[0];
var stelling_text = [
    "Er moet meer geld naar ontwikkelingshulp",
    "De overheid moet afslanken",
    "De AOW leeftijd moet terug naar 67 jaar",
    "Wietteelt moet worden gelegaliseerd",
    "We moeten minder geld aan het leger uitgeven",
    "Alle werkenden moeten minder loonbelasting betalen",
    "Alle overheden van hoog tot laag moeten het aantal regels dat geldt binnen onze samenleving drastisch terug brengen.",
    "Als men de regels niet kan handhaven, moet men ze ook niet instellen."
]
var button3 = document.getElementById("btnVolgende");

grid_container.appendChild(container);
document.body.appendChild(container);       //----------- maakt een container aan
container.id = ('stemWijzer');

for (b = 1; b <= 1; b++) {
    var div = document.createElement("DIV");  //----------- maakt div's aan
    div.id = "buttons";                       //|
    container.appendChild(div);               //|
    
    var h1 = document.createElement("H1")                   //----------- maakt een h1 (met tekst) aan
    div.appendChild(h1);                                    //|
    h1.id = "stelling";                                     //|
    h1.innerHTML = "Nederland moet terug naar de Gulden";   //|

    for (var i = 0; i < 3; i++) {
        var button = document.createElement("button");      //----------- maakt de buttons aan
        div.appendChild(button);                            //|
        button.id = id_button[i];                           //|
        button.innerHTML = button_text[i];                  //|
    }
}

var button1clicked = document.getElementById("btnEens");
button1clicked.onclick = setButtonStelling;

var button2clicked = document.getElementById("btnOneens");
button2clicked.onclick = setButtonStelling;
var button3clicked = document.getElementById("btnVolgende");
button3clicked.onclick = stelling2;

document.getElementById("btnVolgende").style.display= "none"

var EENS = 0;

function eens() {
    document.getElementById("btnVolgende").style.display = "";
    EENS = EENS + 1
    button3clicked.onclick = stelling3;
}

function setButtonStelling() {
    document.getElementById("btnVolgende").style.display = "";
}


function stelling2() {
    document.getElementById("stelling").innerHTML = stelling_text[1];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = eens;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling3;
}

function stelling3() {
    document.getElementById("stelling").innerHTML = stelling_text[2];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = eens;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling4;
}

function stelling4() {
    document.getElementById("stelling").innerHTML = stelling_text[3];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = setButtonStelling;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling5;
}

function stelling5() {
    document.getElementById("stelling").innerHTML = stelling_text[4];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = setButtonStelling;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling6;
}

function stelling6() {
    document.getElementById("stelling").innerHTML = stelling_text[5];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = setButtonStelling;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling7;
}

function stelling7() {
    document.getElementById("stelling").innerHTML = stelling_text[6];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[0]).onclick = setButtonStelling;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = stelling8;
}

function stelling8() {
    document.getElementById("stelling").innerHTML = stelling_text[7];
    setTimeout(function () {                                                                
        document.getElementById("btnVolgende").style.display= "none"                                                                
    }, 50); 

    document.getElementById(id_button[2]).innerHTML= "VOLTOOIEN";

    document.getElementById(id_button[0]).onclick = setButtonStelling;
    document.getElementById(id_button[1]).onclick = setButtonStelling;
    button3clicked.onclick = voltooien;
}

function voltooien() {
if (EENS == 8) {
    document.getElementById("stelling").innerHTML = "U heeft 8 keer EENS gestemd. De partij die het beste bij uw voorkeur past is D66";   
} else if (EENS >= 5 && EENS <= 7) {
    document.getElementById("stelling").innerHTML = "U heeft " + EENS + " keer EENS gestemd. De partij die het beste bij uw voorkeur past is PVDA" 
} else if (EENS < 5) {
    document.getElementById("stelling").innerHTML = "U heeft " + eens + " keer EENS gestemd. De partij die het beste bij uw voorkeur past is CDA" 
}

}


