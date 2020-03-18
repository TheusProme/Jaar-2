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

function loadparties() {

    while (wrappereens.children.length > 1) {
        wrappereens.children[1].remove();
    }
    while (wrapperoneens.children.length > 1) {
        wrapperoneens.children[1].remove();
    }
    while (wrappergeen.children.length > 1) {
        wrappergeen.children[1].remove();
    }


    subjects[quest]["parties"].forEach(function (value) {
        // console.log(value);
        partydetail = document.createElement("details");
        partysummary = document.createElement("summary");
        partymening = document.createElement("p");
        partysummary.innerText = value.name;
        partymening.innerText = value.opinion;

        partydetail.appendChild(partysummary);
        partydetail.appendChild(partymening);

        switch (value.position) {
            case "pro":
                wrappereens.appendChild(partydetail);
                break;

            case "contra":
                wrapperoneens.appendChild(partydetail);
                break;

            case "none":
                wrappergeen.appendChild(partydetail);
                break;

            default:
                break;
        }
    })
}

function extra() {
    partyinfo.style.display = "none";
    extra_stelling.style.display = "";

    stellingtitle.innerText = "Zijn er onderwerpen die u extra belangrijk vindt?";
    stellingstatement.innerText = "Aangevinkte stellingen tellen extra mee bij het berekenen van het resulaat.";
}

function partijen() {
    partyinfo.style.display = "none";
    extra_stelling.style.display = "none";

    stellingtitle.innerText = "Partijen";
    stellingstatement.innerText = "Aangevinkte stellingen tellen extra mee bij het berekenen van het resulaat.";

    headcontainer = document.getElementsByClassName("container")[0];

    var div_extra = document.createElement("DIV");                //----------- maakt div's aan
    div_extra.id = "stelling_title";                              //|
    headcontainer.appendChild(div_extra);                         //|

    var h1 = document.createElement("H1")                         //----------- maakt een h1 (met tekst) aan
    div_extra.appendChild(h1);                                    //|
    h1.className = "h1-extra";                                    //|
    h1.innerHTML = "Partijen om uit te kiezen";                   //|

    var select = document.createElement("select");
    div_extra.appendChild(select);
    select.className = "partie-select";
    select.id = "party_selection";
    [{ name: "Alle partijen", value: "all" }, { name: "Seculaire partijen", value: "secular" }, { name: "Grote partijen", value: "big" }].forEach(value => {
        var option = document.createElement("option");
        option.value = value.value;
        option.innerText = value.name;
        select.appendChild(option);
    });

    for (var z = 0; z < parties.length; z++) {
        var input_extra = document.createElement("input")                 //----------- maakt een p (met tekst) aan
        input_extra.className = "parties-input";                            //|
        input_extra.id = "partie_" + z;
        input_extra.type = "checkbox";

        var label_extra = document.createElement("label")                 //----------- maakt een p (met tekst) aan
        label_extra.className = "parties-label";                            //|
        label_extra.for = "partie_" + z;
        label_extra.innerText = parties[z]["name"];

        var p_extra = document.createElement("p")                 //----------- maakt een p (met tekst) aan
        div_extra.appendChild(p_extra);
        p_extra.appendChild(input_extra);
        p_extra.appendChild(label_extra);                         //|
        p_extra.className = "parties";                            //|
    }



    var nextbutton = document.createElement("button")                     //----------- maakt een button (met tekst) aan
    div_extra.appendChild(nextbutton);                                    //|
    nextbutton.className = "button-stelling";                             //|
    nextbutton.innerHTML = "Volgende";                                    //|
    nextbutton.onclick = uitkomst;
}

function uitkomst() {
    stellingtitle.style.display = "none";
    partyinfo.style.display = "none";
    container.style.backgroundColor = "rgb(233, 231, 231)";

    var type = "";
    var partyarray = {};

    parties.forEach((value, index) => {
        partyarray[value.name] = {
            name: value.name,
            total: 0,
            index: index
        }
    })

    for (let i = 0; i < answers.length; i++) {
        //    partyarray[]; 
        type = answers[i]
        subjects[i].parties.forEach(value => {
            if (document.getElementById("partie_" + partyarray[value.name].index).checked) return;
            if (party_selection.value !== "all") {
                if (party_selection.value === "secular") {
                    if (!parties[partyarray[value.name].index].secular) {
                        return;
                    }
                } else if (party_selection.value === "big") {
                    if (!parties[partyarray[value.name].index].size < 10) {
                        return;
                    }
                }
            }
            var effective = 1;
            if (document.getElementById("theme_" + (i + 1)).checked) effective = 2;
            switch (type) {
                case "eens":
                    if (value.position == "pro") {
                        partyarray[value.name].total += effective;
                    }
                    break;
                case "oneens":
                    if (value.position == "contra") {
                        partyarray[value.name].total += effective;
                    }
                    break;
                case "geen":
                    if (value.position == "none") {
                        partyarray[value.name].total += effective;
                    }
                    break;

                default:
                    break;
            }
        });
    }


    var array = [];

    Object.keys(partyarray).forEach(value => {
        array.push([value, partyarray[value]]);
    });

    array.sort(function (a, b) {
        return b[1].total - a[1].total;
    });

    partyarray = {};

    array.forEach(value => {
        partyarray[value[0]] = value[1];
    });
    console.log(JSON.stringify(partyarray, null, 4));
    Object.values(partyarray).forEach((value, index) => {
        if (index < 3) {
            // console.log(value.name);
            stelling_title.style.display = "none";
            var str = value.name
            var replaced = str.replace(new RegExp(" ", 'g'), "-");
            console.log("------->" + replaced);

            uitkomsttitle.innerText = "Dit is de uitkomst:";
            stellingstatement.innerText = "";

            headcontainer = document.getElementsByClassName("uitkomst-stemwijzer")[0];

            var div_uitkomst = document.createElement("DIV");
            div_uitkomst.id = "stelling-uitkomst";
            headcontainer.appendChild(div_uitkomst);

            var img_uitkomst = document.createElement("img")
            div_uitkomst.appendChild(img_uitkomst);
            img_uitkomst.className = "img_uitkomst";
            img_uitkomst.setAttribute("src", "images/partijen/" + replaced + ".png");
            // img_uitkomst.style.backgroundImage = "URL('../images/partijen/')"+ value.name;

            var p_uitkomst = document.createElement("p")
            div_uitkomst.appendChild(p_uitkomst);
            p_uitkomst.className = "p-uitkomst";
            p_uitkomst.innerText = value.name;

            var p_uitkomst = document.createElement("p")
            div_uitkomst.appendChild(p_uitkomst);
            p_uitkomst.className = "p-uitkomst";
            p_uitkomst.innerText = value.total;


        } else {
            // console.log(value.name);
        }

    });
}