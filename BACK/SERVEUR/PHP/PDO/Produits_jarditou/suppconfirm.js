/* Lorsqu'on clique sur le lien, on affiche un message de confirmation. 
Si l'utilisateur clique OK, il est redirigé vers le lien
Si l'utilisateur clique sur annuler, il revient sur la page détail sans appeler le script de suppression */

var lien = document.getElementById('buttonDel');
var g = window.location.search;
lien.addEventListener('click', function () {

    var c = confirm("Voulez vous vraiment supprimer cet article ? ");
    if (c == true) {
        alert("Votre article sera bien supprimé.");
        window.location.assign("delete_produit_script.php"+g);
    }
    else {
        alert("L'article n'a pas été supprimé.");
        window.location;
    }
})