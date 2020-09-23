var nom = window.prompt("Entrez un prénom");
var tableau = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];

function verif(tableau, mot) {
    var result = tableau.indexOf(mot);  //Cherche l'index de la première occurence du mot
    if (result != (-1)) {               //le mot a été trouvé
        tableau.splice(result, 1);      //Supprime 1 élément a partir du mot
        tableau.push("");               //Ajoute un poste de valeur nulle à la fin du tableau
    
    console.log(tableau);
    }
    if (result == (-1)) {               // Le mot n'a pas été trouvé
        window.alert("Erreur, le nom n'a pas été trouvé");
    }
}

verif(tableau,nom);