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
var charU = new RegExp("^[ a-zA-Z]+$");
var filtreDate = new RegExp("^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$");
var filtreCp = new RegExp("^[0-9]{5}$");
var filtreEmail = new RegExp("^[_a-z0-9-]+(.[_a-z0-9-]+)+@[a-z]+.[a-z]{2,3}$");
var filtreQuestion = new RegExp("^.+$");
document.getElementById("form2").addEventListener("submit", function(evenement) {

    if (charU.test(nom.value) == false) {
        evenement.preventDefault();
        document.getElementById("alerte-nom").textContent = "Veuillez entrer un nom valide !";
        nom.focus();
    }

    if (charU.test(prenom.value) == false) {
        evenement.preventDefault();
        document.getElementById("alerte-prenom").textContent = "Veuillez entrer un prénom valide !";
        prenom.focus();
    }

    if (sexe1.checked == false && sexe2.checked == false) {
        evenement.preventDefault();
        document.getElementById("alerte-sexe").textContent = "Veuillez cocher votre sexe !";
    }

    if (filtreDate.test(ddn.value) == false) {
        evenement.preventDefault();
        document.getElementById("alerte-date").textContent = "Veuillez entrer une date de naissance valide";
        ddn.focus();
    }

    if (filtreCp.test(cp.value) == false) {
        evenement.preventDefault();
        document.getElementById("alerte-cp").textContent = "Veuillez entrer un code postal valide !";
        cp.focus();
    }
    if (filtreEmail.test(email.value) == false) {
        evenement.preventDefault();
        document.getElementById("alerte-email").textContent = "Veuillez entrer un email valide !";
        email.focus();
    }
    if (filtreQuestion.test(question.value) == false ){
        evenement.preventDefault();
        document.getElementById("alerte-question").textContent = "Veuillez entrer votre question !"
        question.focus();
    }

    if (valid.checked == false) {
        evenement.preventDefault();
        document.getElementById("alerte-valider").textContent = "Veuillez accepter le traitement de votre formulaire";
    }
})

