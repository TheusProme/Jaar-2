var container = document.createElement("DIV");          //----------- maakt een container aan
var id_button = ["btnEens", "btnGeen", "btnOneens", "btnNext", "parties"]
var button_text = ["Eens", "Geen van beide", "Oneens", "Sla vraag over -->", "Wat vinden de partijen?"]
var headcontainer = document.getElementsByClassName("form")[0];
var progressbar = 0;
var button3 = document.getElementById("btnVolgende");

headcontainer.appendChild(container);                   //----------- voegt container aan form[div]
container.id = ('stemWijzer');

var div = document.createElement("DIV");                //----------- maakt div's aan
div.id = "stelling";                                    //|
container.appendChild(div);                             //|

var h1 = document.createElement("H1")                   //----------- maakt een h1 (met tekst) aan
div.appendChild(h1);                                    //|
h1.className = "h1-stelling";                           //|
h1.innerHTML = subjects[0].title;                       //|

var p = document.createElement("p")                     //----------- maakt een p (met tekst) aan
div.appendChild(p);                                     //|
p.className = "p-stelling";                             //|
p.innerHTML = subjects[0].statement;                    //|

for (var i = 0; i < 4; i++) {
    var button = document.createElement("button");      //----------- maakt de buttons aan
    div.appendChild(button);                            //|
    button.id = id_button[i];                           //|
    button.className = "button-stelling"                //|
    button.innerHTML = button_text[i];                  //|
}

var div = document.createElement("DIV");                //----------- maakt div's aan
div.id = "Partij";                                      //|
container.appendChild(div);                             //|

var buttonback = document.getElementById("back");
buttonback.onclick = Back;
var button1clicked = document.getElementById(id_button[0]);
button1clicked.onclick = EENSclicked;
var button2clicked = document.getElementById(id_button[1]);
button2clicked.onclick = GEENclicked;
var button3clicked = document.getElementById(id_button[2]);
button3clicked.onclick = ONEENSclicked;
var button4clicked = document.getElementById(id_button[3]);
button4clicked.onclick = volgendestelling;

var Andwoord = [0, 0, 0];
var Andwoordstelling = [];
var V = 0;

function EENSclicked() {
    Andwoord[0] = Andwoord[0] + 1;
    Andwoordstelling.push({ titel: h1.innerHTML = subjects[V].title, opmerking: p.innerHTML = subjects[V].statement });
    console.log("Stelling " + V + " beandwoord met: " + Andwoord);
    console.log("Array " + JSON.stringify(Andwoordstelling));
    volgendestelling()
}
function GEENclicked() {
    Andwoord[1] = Andwoord[1] + 1;
    console.log("Stelling " + V + " beandwoord met: " + Andwoord);
    console.log("Array " + JSON.stringify(Andwoordstelling));
    volgendestelling()
}
function ONEENSclicked() {
    Andwoord[2] = Andwoord[2] + 1;
    console.log("Stelling " + V + " beandwoord met: " + Andwoord);
    console.log("Array " + JSON.stringify(Andwoordstelling));
    volgendestelling()
}
function Back() {
    console.log("stelling: " + V);
    V--
    console.log(JSON.stringify(Andwoordstelling[V]))
    delete Andwoordstelling[V].titel;
    delete Andwoordstelling[V].opmerking;
    console.log("Array " + JSON.stringify(Andwoordstelling));
    vorigestelling()
}

function volgendestelling() {
    // alert("hoi");
    V = V + 1;
    console.log("stelling: " + V);

    if (V == 30) {
        alert("LET OP! U kunt na het antwoord invullen van deze vraag niet meer terug.");
        h1.innerHTML = "Zijn er onderwerpen die u extra belangrijk vindt?";
        p.innerHTML = "Aangevinkte stellingen tellen extra mee bij het berekenen van het resulaat.";
        document.getElementById("back").style.display = "none";
        document.getElementById(id_button[0]).style.display = "none";
        document.getElementById(id_button[1]).style.display = "none";
        document.getElementById(id_button[2]).style.display = "none";
        document.getElementById(id_button[3]).style.display = "none";
        extra();
    } else {
        progressbar++
        document.getElementById('progressbar').style.transition = "0.5s";
        document.getElementById('progressbar').style.width = [progressbar + 1] / 30 * 100 + '%';

        h1.innerHTML = subjects[V].title;
        p.innerHTML = subjects[V].statement;
    }
}

function vorigestelling() {
    // alert("hoi");
    progressbar--
    document.getElementById('progressbar').style.transition = "0.5s";
    document.getElementById('progressbar').style.width = [progressbar + 1] / 30 * 100 + '%';
    console.log(V);

    if (V < 0) {
        window.location.href = "index.html";
    } else {
        h1.innerHTML = subjects[V].title;
        p.innerHTML = subjects[V].statement;
    }
}

function extra() {
    console.log("Waarde: " + V);

    headcontainer = document.getElementsByClassName("container")[0];

    var div_extra = document.createElement("DIV");                //----------- maakt div's aan
    div_extra.id = "stelling-title";                              //|
    headcontainer.appendChild(div_extra);                         //|

    var h1 = document.createElement("H1")                         //----------- maakt een h1 (met tekst) aan
    div_extra.appendChild(h1);                                    //|
    h1.className = "h1-extra";                                    //|
    h1.innerHTML = "Extra belangrijke onderwerpen";               //|

    for (var z = 0; z < V; z++) {
        var p_extra = document.createElement("p")                 //----------- maakt een p (met tekst) aan
        div_extra.appendChild(p_extra);                           //|
        p_extra.className = "p-stelling";                         //|
        p_extra.innerHTML = subjects[z].title;
    }
}