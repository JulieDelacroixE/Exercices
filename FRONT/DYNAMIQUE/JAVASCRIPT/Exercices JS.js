// Exercice conditions 1


var a = window.prompt("Entrez un nombre : ");

if (a%2 == 0)
{
    window.alert("C'est un nombre pair");
}
else
{
    window.alert("C'est un nombre impair")
}


// Exercice conditions 2


let a = 2020;
let b = parseInt(window.prompt("Quelle est votre année de naissance ?"));

if (a - b < 18) {
    window.alert(a-b + " ans, vous êtes mineur");
}
else {
    window.alert(a-b + " ans, vous êtes majeur");
}


// Exercice conditions 3

let a = parseInt(window.prompt("Entrez un nombre"));
let b = parseInt(window.prompt("Entrez un deuxième nombre"));
let c = window.prompt("Entrez l'opérateur");

if (c != "+" && c!="-" && c!="*" &&c!="/")
{
    window.alert("Entrez un opérateur correct");
}
else if (c=="+")
{
    window.alert(a+b);
}
else if (c=="-")
{
    window.alert(a-b);
}
else if (c=="*")
{
    window.alert(a*b);
}
else if (c=="/")
{
    if (b== 0)
    {
        window.alert("Erreur, division par 0");
    }
    else
    {
        window.alert(a/b);
    }
}

// Exercice boucles 1

var x=1;
var a = "a";
var name ="";
var nombre = 0


while (a != "" && a != null)
{
    a = window.prompt(`Entrez le prénom N° :${x}`);

    if (a != null)
    {
    name = `${name}
            ${a}`;
    nombre=x;
    }
    else
    {
        name = `${name}`;
        nombre=x;
    }
    x++;
}

console.log(name);
console.log(`${nombre-1} noms`);


// Exercice boucle 2

var n = window.prompt("Entrez un nombre");

for (i=n; i>=0; i--)
{
    var resultat = `${i}`;
    console.log(resultat);
}

// Exercice boucle 3

var n = parseInt(window.prompt("Entrez un nombre"));
var i = 0;
var som = 0;
var m = 0

while (n!=0)
{
    
    som = som + n;
    i++;
    console.log(`${n}`);
    n--;
    
}

m = som / i;
console.log(`${m}`);

// Exercice boucle 4

var x = parseInt(window.prompt("Entrez un nombre"));
var n = parseInt(window.prompt("Entrez un deuxième nombre"));
var i = 0;

for (i=1;i<=n;i++)
{
    console.log(`${i} x ${x} = ${i*x}`);
}

// Exercice boucles 5


// Exercice fonctions 1

var x = parseInt(window.prompt("Entrez un nombre"));
var y = parseInt(window.prompt("Entrez un multiplicateur"));

function produit(x, y)
{
    var produit = x*y;
    return produit;
}

// Exercice fonctions 2

function strtok(str1, str2, n) {
    var a = (n-1)*8;
    var result = str1.substr(a, 6);
    return result;

}

const paragraph = "robert ;dupont ;amiens ;80000";
console.log(strtok(paragraph, ";", 3));

// Exercice tableaux 1

var n = parseInt(window.prompt("Entrez le nombre d'élément de votre tableau :"));
var tableau = new Array(n)
var num = 0;
for(i=0; i<n;i++){
  num++;
var elem = window.prompt("Entrez l'élément numéro : " + num);
tableau[i] = [elem];
}

console.log(tableau);


// Exercice tableaux 2 

/* Créer le programme qui fournira un menu permettant d’obtenir les fonctionnalités suivantes à partir d’un tableau à une dimension :

    Affichage du contenu de tous les postes du tableau,
    Affichage du contenu d’un poste dont l’index est saisi au clavier,
    Affichage du maximum et de la moyenne des postes du tableau

Ce programme sera structuré de la manière suivante :

    une fonction GetInteger pour lire un entier au clavier,
    une fonction InitTab pour créer et initialiser l’instance de tableau : le nombre de postes souhaité sera entré au clavier,
    une fonction SaisieTab pour permettre la saisie des différents postes du tableau,
    une fonction AfficheTab pour afficher tous les postes du tableau,
    une fonction RechercheTab pour afficher le contenu d’un poste de tableau dont le rang est saisi au clavier
    une fonction InfoTab qui affichera le maximum et la moyenne des postes.

Les fonctions seront appelées successivement. */


function GetInteger(votreNombre){
    var nb = parseInt(votreNombre);
    return nb;
}

function InitTab(n){
    var nb = parseInt(n);
    var tableau = new Array(nb);
    return tableau;
}

function SaisieTab(votreTableau){

    var l = votreTableau.length;
    var num = 0;
    for(i=0; i<l; i++){
        num++;
      var elem = window.prompt("Entrez l'élément numéro : " + num);
      votreTableau[i] = [elem];
    }
    var result = votreTableau;
      return result;
}

function AfficheTab(votreTableau){
    console.log(votreTableau);
}

function RechercheTab(votreTableau, numPoste){
    console.log(votreTableau[numPoste]);
}

function InfoTab(votreTableau){

var somme = 0;
var moy = 0;
for (i=0;i<votreTableau.length;i++) 
{
    somme = somme + parseInt(votreTableau[i]);
}
moy = somme/votreTableau.length;

votreTableau.sort();
var max = votreTableau.length;

console.log(`la valeur max de votre tableau est : ${max} et la moyenne des postes est : ${moy}`);
}


var nb = window.prompt("Entrez un nombre :");

var nombre = GetInteger(nb);

var myTableau = InitTab(nombre);

var myTableau = SaisieTab(myTableau);

AfficheTab(myTableau);

var num = window.prompt("Entrez le numéro du poste que vous voulez voir");

RechercheTab(myTableau, num);

InfoTab(myTableau);

// Exercice tableaux 3


function tri(tableau){
    var l = tableau.length;
    
    for (i=0;i<l;i++){
        for(n=i+1;n<l;n++){
            if (tableau[i]>tableau[n]){
                var c = tableau[i];
                tableau[i] = tableau[n];
                tableau[n] = c;
            } 
        }
    }
    
var result = tableau;
return result;
}
    
    var myTableau = new Array(2, 9, 4, 6, 1, 20, 30, 5, 8);
    tri(myTableau);