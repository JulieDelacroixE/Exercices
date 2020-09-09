var nom = window.prompt("Entrez un prénom");
var tableau = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];

function verif(tableau, mot) {
    var result = tableau.indexOf(mot);
    if (result != (-1)) {
        tableau.splice(result, 1);
        tableau.push("");
    
    console.log(tableau);
    }
    if (result == (-1)) {
        window.alert("Erreur, le nom n'a pas été trouvé");
    }
}

verif(tableau,nom);