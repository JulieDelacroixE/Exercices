<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou détails produit</title>
</head>

<?php include("header.php");?>
        <?php    
        require "connexion_bdd.php"; // Inclusion du fichier de la fonction de connexion
        $db = connexionBase(); // Appel de la fonction connexion
        $pro_id="";
        if(isset($_GET["id"])){
        $pro_id = $_GET["id"];
        }
        $requete = "SELECT * FROM `produits` 
        JOIN `categories` ON `cat_id` = `pro_cat_id`
        WHERE `pro_id` = $pro_id";

        $result = $db->query($requete);

        // Renvoi de l'enregistrement sous forme d'un objet
        $produit = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor();
       ?>

    <body> 
            <br>
            <div class="container text-center">
            <img class ="img-fluid" src= "src/jarditou_photos/<?php echo$produit->pro_id?>.<?php echo$produit->pro_photo?>" alt="<?php echo $produit->pro_libelle?>" width="300" height="auto">
            </div>
            <div class="form-group">
     
        <form>
                <label for="ref">Référence</label>
                <input type="text" class="form-control" id="ref" value ="<?php echo $produit->pro_ref;?>" disabled>
                <label for="">Catégorie</label>
                <input type="text" class="form-control" id="" value="<?php echo $produit->cat_nom?>" disabled>
                <label for="">Libellé</label>
                <input type="text" class="form-control" id="" value="<?php echo $produit->pro_libelle?>" disabled>
                <label for="">Description</label>
                <textarea class="form-control" id="" value="" rows="3" disabled> <?php echo $produit->pro_description?></textarea>
                <label for="">Prix</label>
                <input type="text" class="form-control" id="" value="<?php echo $produit->pro_prix?>" disabled>
                <label for="">Stock</label>
                <input type="text" class="form-control" id="" value="<?php echo $produit->pro_stock?>" disabled>
                <label for="">Couleur</label>
                <input type="text" class="form-control" id="" value="<?php echo $produit->pro_couleur?>" disabled>

            <?php if ($produit->pro_bloque === null) { ?>
            <div class="form-group"><br>
                 <label for="block">Bloqué ?</label><br>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockO" value="Oui" disabled>
                         <label for="blockO" class="form-check-label">Oui</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockN" value="Non" checked disabled>
                         <label for="blockN" class="form-check-label">Non</label>
                     </div>
                </div>
                <?php }
                else if ($produit->pro_bloque == 1) { ?>
                <div class="form-group"><br>
                 <label for="block">Bloqué ?</label><br>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockO" value="Oui" checked disabled>
                         <label for="blockO" class="form-check-label">Oui</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockN" value="Non" disabled>
                         <label for="blockN" class="form-check-label">Non</label>
                     </div>
                 </div>
                <?php }?>
                <label for="dateAjout">Date d'ajout</label>
                <input type="text" class="form-control" id="dateAjout" value="<?php echo $produit->pro_d_ajout?>" disabled>
                <label for="dateModif">Date de modification</label>
                <input type="text" class="form-control" id="dateModif" value="<?php echo $produit->pro_d_modif?>" disabled><br>
                <a href="Index.php" class="btn btn-dark" role="button">Retour</a>
                <a class="btn btn-warning" role="button" href="form_modif.php?id=<?php echo intval($_GET['id'])?>">Modifier</a>
                <a class="btn btn-warning" role="button" id="buttonDel" >Supprimer</a>
            </div>
        </form>
                <script src="assets/js/suppconfirm.js"></script>
    </body>

       <?php include("footer.php");?>