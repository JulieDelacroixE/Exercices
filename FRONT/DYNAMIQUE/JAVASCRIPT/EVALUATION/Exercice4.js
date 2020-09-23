
// Fonction pour le calcul du montant remisé
function remise(tot) {
    var rem = 0;
    if (tot >= 100 && tot <= 200) {
        rem = (tot*5)/100;
    }
    if (tot > 200) {
        rem = (tot*10)/100;
    }
    return rem;
}

//Fonction pour calculer le frais de port selon les cas
function calPort(tot) {
    var port = 0;
    if (tot > 500) {
        port = 0;
    }
    if (tot <= 500) {
        port = (tot*2)/100;
        if (port < 6){
        port = 6;
        }
    }
    return port;
}

var prixU = parseInt(window.prompt("Entrez le prix de votre article"));
var qteCom = parseInt(window.prompt("Entrez la quantité commandée"));
var total = prixU*qteCom;

var rem = remise(total);
var totRem = total - rem; // on calcul le total avec remise

var port = calPort(totRem); // on utilise le total remisé pour calculer les frais de port

var pap = totRem + port;  // Calcul du total à payer

console.log(`Vous devez ${Math.round(pap*100)/100} euros avec une remise de ${Math.round(rem*100)/100} euros et les frais de port à ${Math.round(port*100)/100} euros`); //On arrondi 

