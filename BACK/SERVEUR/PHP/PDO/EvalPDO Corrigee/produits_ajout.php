<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou ajout produit</title>
</head>

<?php include("header.php");?>
<?php 
$refError = "";
if (isset($_GET['error'])) {
    if ($_GET['error'] == "ref") {
        $refError = "La référence doit être unique"; 
    }
}
else {
    $refError = "";
}

?>
<br> 
<div class ="container">        
<p class="h2">Ajouter un produit</p><br>
<form action="produit_ajout_script.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ref">Référence</label>
        <input type="text" class="form-control" id="ref" name="ref">
        <span class="text-danger" name="referenceErr"><?php echo $refError ?></span>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie :</label><br>
        <select class="form-control" name="categorie" id="categorie">
        <?php
        require "connexion_bdd.php";
        $db = connexionBase();
        $requete = "SELECT cat_nom, cat_id FROM categories ORDER BY cat_nom";
        foreach ($db->query($requete) as $row)
        {
        echo "<option value='$row[cat_id]'>" . $row[cat_nom] . "</option>";
        }
        ?>
        </select>
        <span id="errorCat"></span>
    </div>
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" class="form-control" id="libelle" name="libelle">
        <span id="errorLib"></span>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"rows="3" ></textarea>
        <span id="errorDes"></span>
    </div>
    <div class="from-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name ="prix">
        <span id="errorPri"></span>
    </div>
    <div class="form-group">
        <label for="Stock">Stock</label>
        <input type="text" class="form-control" id="Stock" name="Stock">
        <span id="errorSto"></span>
    </div>
    <div class="form-group">
        <label for="couleur">Couleur</label>
        <input type="text" class="form-control" id="couleur" name="couleur">
        <span id="errorCou"></span>
    </div>
    <div class="form-group">
        <label for="block">Bloqué ?</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="block" id="option1" value="1" >
                <label for="option1" class="form-check-label">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="block" id="option2">
                <label for="option2" class="form-check-label">Non</label>
            </div>
            <span id="errorBlo"></span>
    </div>
    <div class="form-group">
        <label for="dateAjout">Date d'ajout</label>
        <input type="text" class="form-control" id="dateAjout" name="d-ajout" placeholder="AAAA-MM-JJ HH:MM:SS">
        <span id="errorDaj"></span>
    </div>
    <div class="form-group">
        <label for="dateModif">Date de modification</label>
        <input type="text" class="form-control" id="dateModif" name="d-modif" disabled><br>
        <span id="errorDmo"></span>
    </div>
    <div class="form-group">
        <label for="photo">Ajouter une photo</label><br>
        <input type="file" name="photo" id="photo"><br>
        <span id="errorPho"></span>
        <input type="hidden" name="MAX_FILE_SIZE" value="400000">
    </div>
    <input type="submit" name="submit" class="btn btn-warning" value="ajouter">
    </form>
</div>

<?php include("footer.php");?>