var jeune = 0;
var moyen = 0;
var vieux = 0;

//Tant que l'utilisateur n'entre pas "100", on continue de lui demander des âges, qui sont ensuite rangé et compté 
do {
  var age = parseInt(window.prompt("Entrez un âge : "));
    
if (age < 20) {
    jeune++;
}
else if (age > 40 ) {
    vieux++;
  if (age == 100) {
    break;
  }
}
else {
    moyen++;
}
} while (age <= 100);

console.log(`nombre de jeune : ${jeune}, nombre de moyen : ${moyen}, nombre de vieux : ${vieux}`);