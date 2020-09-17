var nom = document.getElementById("name");
var prenom = document.getElementById("prenom");
var sexeF = document.getElementById("sexe1");
var sexeM = document.getElementById("sexe2");
var ddn = document.getElementById("date");
var cp = document.getElementById("codepostal");
var email = document.getElementById("email");
var sujet = document.getElementById("sujet").value;
var question = document.getElementById("question");
var valid = document.getElementById("valider");


document.getElementById("form2").addEventListener("submit", function(evenement) {

    if (nom.value.length < 1) {
        evenement.preventDefault();
        document.getElementById("alerte-nom").textContent = "Veuillez entrer un nom valide !";
        nom.focus();
    }

    if (prenom.value.length < 1) {
        evenement.preventDefault();
        document.getElementById("alerte-prenom").textContent = "Veuillez entrer un prénom valide !";
        prenom.focus();
    }

    if (sexe1.checked == false && sexe2.checked == false) {
        evenement.preventDefault();
        document.getElementById("alerte-sexe").textContent = "Veuillez cocher votre sexe !";
    }

    if (ddn.value == "") {
        evenement.preventDefault();
        document.getElementById("alerte-date").textContent = "Veuillez entrer votre date de naissance !";
        ddn.focus();
    }

    if (cp.value.length < 5) {
        evenement.preventDefault();
        document.getElementById("alerte-cp").textContent = "Veuillez entrer un code postal valide !";
        cp.focus();
    }
    if (email.value.indexOf("@") == -1) {
        evenement.preventDefault();
        document.getElementById("alerte-email").textContent = "Veuillez entrer un email valide !";
        email.focus();
    }
    if (question.value.length < 1){
        evenement.preventDefault();
        document.getElementById("alerte-question").textContent = "Veuillez entrer votre question !"
        question.focus();
    }

    if (valid.checked == false) {
        evenement.preventDefault();
        document.getElementById("alerte-valider").textContent = "Veuillez accepter le traitement de votre formulaire";
    }
})

