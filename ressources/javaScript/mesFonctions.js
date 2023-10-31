const myButton = document.getElementById("my-button");

myButton.addEventListener("click", afficherPopupDepotCV_LM);


function afficherPopupDepotCV_LM() {
    document.getElementById("popup").style.display = "flex";
    document.getElementById("aGriser").style.opacity = "0.3";
}

function fermerPopupDepotCV_LM() {
    document.getElementById("popup").style.display = "none";
    document.getElementById("aGriser").style.opacity = "1";
}


const monHref = document.getElementById("ouvrir");
monHref.addEventListener("click", afficherPopupMdp);


function afficherPopupMdp() {
    document.getElementById("popupMdp").style.display = "flex";
    document.getElementById("center").style.opacity = "0.3";
}

function fermerPopupMdp() {
    document.getElementById("popupMdp").style.display = "none";
    document.getElementById("center").style.opacity = "1";
}


function afficherPopupPremiereCo(indice) {
    document.getElementById("popupPremiereCo").style.display = "flex";
    document.getElementById("conteneurPrincipal").style.opacity = "0.3";
    for (let i = 0; i < document.getElementById("popupPremiereCo").children.length; i++) {
        if (i === indice) {
            document.getElementById("popupPremiereCo").children[i].style.display = "flex";
        } else {
            document.getElementById("popupPremiereCo").children[i].style.display = "none";
        }
    }
}
