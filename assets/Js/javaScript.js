function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function chageTypeInput() {
    var modePaiement = document.getElementById("modePaiement").value;
    if (modePaiement == 0) {
        document.getElementById("moncash").classList.add("lbi");
        document.getElementById("carte").classList.remove("lbi");

        // document.getElementById("noCarte").add();
        // document.getElementById("noCarteL").add();
    } else if (modePaiement == 1) {
        document.getElementById("moncash").classList.remove("lbi");
        document.getElementById("carte").classList.add("lbi");
        // document.getElementById("noCarteL").remove();

        // document.getElementById("noCarte").add();
        // document.getElementById("noCarteL").add();
    }
}