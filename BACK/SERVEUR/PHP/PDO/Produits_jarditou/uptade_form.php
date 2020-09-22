<?php include("header.php");?>
      

<?php    
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

       ?>

<form>
            
            <div class="form-group">
     
                <label for="ref">Référence</label>
                <input type="text" class="form-control" id="ref" value ="">
                <label for="">Catégorie</label>
                <input type="text" class="form-control" id="" value="">
                <label for="">Libellé</label>
                <input type="text" class="form-control" id="" value="">
                <label for="">Description</label>
                <textarea class="form-control" id="" value="" rows="3"> </textarea>
                <label for="">Prix</label>
                <input type="text" class="form-control" id="" value="">
                <label for="">Stock</label>
                <input type="text" class="form-control" id="" value="">
                <label for="">Couleur</label>
                <input type="text" class="form-control" id="" value="">

                
                 <div class="form-group"><br>
                 <label for="block">Bloqué ?</label><br>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockO" value="Oui">
                         <label for="blockO" class="form-check-label">Oui</label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" class="form-check-input" name="block" id="blockN" value="Non" checked>
                         <label for="blockN" class="form-check-label">Non</label>
                     </div>
                 </div>
                
                <label for="dateAjout">Date d'ajout</label>
                <input type="text" class="form-control" id="dateAjout" value="">
                <label for="dateModif">Date de modification</label>
                <input type="text" class="form-control" id="dateModif" value=""><br>
                <a href="liste.php" class="btn btn-dark" role="button">Retour</a>
                <a href="update_form.php" class="btn btn-warning" role="button">Modifier</a>
                <button type="button" id="supprimer" class="btn btn-danger">Supprimer</button>
            </div>
        </form>

    </body>

       <?php include("footer.php");?>

