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
?>
<br>         
<p class="h2">Modifier un produit</p><br>
<div class="form-group">
    <form action="form_modif_script.php?id=<?php echo $pro_id?>" method="POST">
                <label for="ref">Référence</label>
                <input type="text" class="form-control" id="ref" name="ref" value="<?php echo $produit->pro_ref;?>">
                <span name="referenceErr"></span>
                <div class="form-group">
                <label for="Categorie">Catégorie</label>
                <select class="form-control" id="Categorie" name="categorie">
                    <option value="1">Outillage</option>
                    <option value="2">Outillage manuel</option>
                    <option value="3">Outillage mécanique</option>
                    <option value="4">Plants et semis</option>
                    <option value="5">Arbres et arbustres</option>
                    <option value="6">Pots et accessoires</option>
                    <option value="7">Mobilier de jardin</option>
                    <option value="8">Matériaux</option>
                    <option value="9">Tondeuses éléctriques</option>
                    <option value="10">Tondeuses à moteur thermique</option>
                    <option value="11">Débroussailleuses</option>
                    <option value="12">Sécateurs</option>
                    <option value="13">Brouettes</option>
                    <option value="14">Tomates</option>
                    <option value="15">Poireaux</option>
                    <option value="16">Salade</option>
                    <option value="17">Haricots</option>
                    <option value="18">Thuyas</option>
                    <option value="19">Oliviers</option>
                    <option value="20">Pommiers</option>
                    <option value="21">Pots de fleurs</option>
                    <option value="22">Soucoupes</option>
                    <option value="23">Supports</option>
                    <option value="24">Transats</option>
                    <option value="25">Parasols</option>
                </select>
                </div>
                <label for="">Libellé</label>
                <input type="text" class="form-control" id="" name="libelle" value="<?php echo $produit->pro_libelle?>">
                <label for="">Description</label>
                <textarea class="form-control" id="" name="description"rows="3" ><?php echo $produit->pro_description?></textarea>
                <label for="">Prix</label>
                <input type="text" class="form-control" id="" name ="prix" value="<?php echo $produit->pro_prix?>">
                <label for="">Stock</label>
                <input type="text" class="form-control" id="" name="Stock" value="<?php echo $produit->pro_stock?>">
                <label for="">Couleur</label>
                <input type="text" class="form-control" id="" name="couleur" value="<?php echo $produit->pro_couleur?>">
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
                <input type="submit" name="submit" class="btn btn-warning" value="Envoyer">
    </form>
</div>

<?php include("footer.php");?>