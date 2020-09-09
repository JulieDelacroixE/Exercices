var elemSociete = document.getElementById("societe").value;
var elemPersContact = document.getElementById("perscontact").value;
var elemCP = document.getElementById("CP").value;
var elemVille = document.getElementById("ville").value;
var elemEmail = document.getElementById("email").value;
var elemListe = document.getElementById("selecprojet");
var elemProjetText = document.getElementById("envprojet");

document.forms[0].addEventListener("submit", function(evenement) {

    if (elemSociete.length < 1) {
          evenement.preventDefault();
          alert("Veuillez entrer un nom de société");
          elemSociete.focus;
    }
    else if (elemPersContact.length < 1) {
        evenement.preventDefault();
        alert("Veuillez entrer un nom valide");
        elemPersContact.focus;
    }
    else if (elemCP.length != 5) {
        evenement.preventDefault();
        alert("Veuillez entrer un code postal à 5 chiffres");
        elemCP.focus;
    }
    else if (elemVille.length < 1) {
        evenement.preventDefault();
        alert("Veuillez entrer un nom de ville");
        elemVille.focus;
    }
    else if (elemEmail.indexOf("@") == -1) {
        evenement.preventDefault();
        alert("Entrez une adresse email valide");
        elemEmail.focus;
    }
});


elemListe.addEventListener("change",function(event) {
        var textOptSelect = elemListe.options[ elemListe.selectedIndex ].text;
        elemProjetText.innerText = `${elemProjetText.value} ${textOptSelect},`;      
})