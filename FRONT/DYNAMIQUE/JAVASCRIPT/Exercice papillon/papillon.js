var x = parseInt(window.prompt("Entrez un nombre"));
var y = parseInt(window.prompt("Entrez un multiplicateur"));

function produit(x, y) {
    let produit = x * y;
    return produit;
}
function cube(x) {

    let cube = x*x*x;
    return cube;
}

function afficheImg(image) {

    var image = new Image();
    image.src = 'papillon.jpg';
    image.alt = "papillon";
    document.getElementById("image").appendChild(image);
}

if (x != "" && y != "")
{
    afficheImg(image);
    document.getElementById("p2").innerHTML = `le cube de ${x} est égal à ${cube(x)}`;
    document.getElementById("p3").innerHTML = `le produit de ${x} et ${y} est égal à ${produit(x, y)}`
}
