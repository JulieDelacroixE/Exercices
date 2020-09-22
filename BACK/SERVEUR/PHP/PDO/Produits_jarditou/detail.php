<?php include("header.php");?>
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
        $db = connexionBase(); // Appel de la fonction deconnexion
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
        <form>
            <div class="col-3 justify-content-center">
            <img class ="img-fluid" src= "jarditou_photos/<?php echo$produit->pro_id?>.<?php echo$produit->pro_photo?>" alt="<?php echo $produit->pro_libelle?>" width="300" height="auto">
            </div>
            <div class="form-group">
     
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

                <?php if ($produit->pro_bloque === null) {
                 echo '<div class="form-group"><br>
                 <label for="block">Bloqué ?</label><br>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockO" value="Oui" disabled>
                         <label for="blockO" class="form-check-label">Oui</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockN" value="Non" checked disabled>
                         <label for="blockN" class="form-check-label">Non</label>
                     </div>
                 </div>';
                }
                else if ($produit->pro_bloque == 1) {
                echo '<div class="form-group"><br>
                 <label for="block">Bloqué ?</label><br>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockO" value="Oui" checked disabled>
                         <label for="blockO" class="form-check-label">Oui</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockN" value="Non" disabled>
                         <label for="blockN" class="form-check-label">Non</label>
                     </div>
                 </div>';
                }?>
                <label for="dateAjout">Date d'ajout</label>
                <input type="text" class="form-control" id="dateAjout" value="<?php echo $produit->pro_d_ajout?>" disabled>
                <label for="dateModif">Date de modification</label>
                <input type="text" class="form-control" id="dateModif" value="<?php echo $produit->pro_d_modif?>" disabled><br>
                <a href="liste.php" class="btn btn-dark" role="button">Retour</a>
                <a class="btn btn-warning" role="button" href="form_modif.php?id=<?php echo intval($_GET['id'])?>">Modifier</a>
                <a class="btn btn-warning" role="button" id="buttonDel" >Supprimer</a>
            </div>
        </form>
                <script src="suppconfirm.js"></script>
    </body>

       <?php include("footer.php");?>