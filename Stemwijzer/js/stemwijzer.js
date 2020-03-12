var quest = 0;
var answers = [];
var progressbar_count = 0;

var eens = "eens";
var geen = "geen";
var oneens = "oneens";

extra_stelling.style.display = "none";


get_question(quest);


function get_question(question) {
    stellingtitle.innerText = subjects[quest]["title"];
    stellingstatement.innerText = subjects[quest]["statement"];
    loadparties();
}

function vote(voting) {
    // progressbar_count++
    // progressbar.style.transition = "0.5s";
    // progressbar.style.width = [progressbar_count + 1] / 30 * 100 + '%';

    // answers[quest] = voting;
    // quest++;
    // get_question(quest);

    if (quest == 29) {
        alert("LET OP! U kunt na het antwoord invullen van deze vraag niet meer terug.");

        btnEens.style.display = "none";
        btnGeen.style.display = "none";
        btnOneens.style.display = "none";
        btnNext.style.display = "none";
        extra();
    } else {
        if (voting == null) {
            progressbar_count++
            progressbar.style.transition = "0.5s";
            progressbar.style.width = [progressbar_count + 1] / 30 * 100 + '%';

            answers[quest] = "";
            quest++;
            get_question(quest);
        } else {
            progressbar_count++
            progressbar.style.transition = "0.5s";
            progressbar.style.width = [progressbar_count + 1] / 30 * 100 + '%';

            answers[quest] = voting;
            quest++;
            get_question(quest);
        }

    }
}

function back() {
    progressbar_count--
    progressbar.style.transition = "0.5s";
    progressbar.style.width = [progressbar_count + 1] / 30 * 100 + '%';

    if (quest > 0) {
        quest--
    } else {
        window.location.href = "index.html";
    }
    get_question(quest);
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