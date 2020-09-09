var age = parseInt(window.prompt("Entrez un âge : "));
var jeune = 0;
var moyen = 0;
var vieux = 0;

while (age <= 100) {
    age = parseInt(window.prompt("Entrez un âge : "));
if (age < 20) {
    jeune++;
}
else if (age > 40) {
    vieux++;
}
else {
    moyen++;
}
}

console.log(`nombre de jeune : ${jeune}, nombre de moyen : ${moyen}, nombre de vieux : ${vieux}`);