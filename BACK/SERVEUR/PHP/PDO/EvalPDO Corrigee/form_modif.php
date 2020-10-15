<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou modification produit</title>
</head>

<?php include("header.php");?>

<?php 
require "connexion_bdd.php";
$db = connexionBase();
$pro_id = $_GET['id'];
$requete = "SELECT * FROM produits
JOIN categories ON cat_id = pro_cat_id
WHERE pro_id = $pro_id";

$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();


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
<p class="h2">Modifier un produit</p><br>
    <form action="form_modif_script.php?id=<?php echo $pro_id?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ref">Référence</label>
                <input type="text" class="form-control" id="ref" name="ref" value="<?php echo $produit->pro_ref;?>">
                <span class="text-danger" name="referenceErr"><?php echo $refError ?></span><br>
            
            
                <label for="categorie">Catégorie :</label><br>
                <select class="form-control" name="categorie" id="categorie">
                
                <?php

                $sql = "SELECT cat_nom, cat_id FROM categories ORDER BY cat_nom";

                foreach ($db->query($sql) as $row)
                {
                echo "<option value='$produit->pro_cat_id'>" . $produit->cat_nom . "</option selected>";
                echo "<option value='$row[cat_id]'>" . $row[cat_nom] . "</option>";
                }
                ?>
                </select>
              
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $produit->pro_libelle?>">
            
            
                <label for="">Description</label>
                <textarea class="form-control" id="" name="description"rows="3" ><?php echo $produit->pro_description?></textarea>
            
                <label for="">Prix</label>
                <input type="text" class="form-control" id="" name ="prix" value="<?php echo $produit->pro_prix?>">
                <label for="">Stock</label>
                <input type="text" class="form-control" id="" name="Stock" value="<?php echo $produit->pro_stock?>">
                <label for="">Couleur</label>
                <input type="text" class="form-control" id="" name="couleur" value="<?php echo $produit->pro_couleur?>">
                </div>
                <div class="form-group"><br>
                    <label for="block">Bloqué ?</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="block" id="option1" value="1" >
                            <label for="option1" class="form-check-label">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="block" id="option2">
                            <label for="option2" class="form-check-label">Non</label>
                        </div>
                </div>
                <label for="dateAjout">Date d'ajout</label>
                <input type="text" class="form-control" id="dateAjout" name="d-ajout"  value="<?php echo $produit->pro_d_ajout?>" disabled>
                <label for="dateModif">Date de modification</label>
                <input type="text" class="form-control" id="dateModif" name="d-modif" value="<?php echo $produit->pro_d_modif?>"><br>
                <label for="photo">Ajouter une photo</label><br>
                <input type="file" name="photo" id="photo"><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="8000000"><br>
                <input type="submit" name="submit" class="btn btn-warning" value="Envoyer">
    </form>
</div>

<?php include("footer.php");?>