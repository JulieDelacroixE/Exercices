<?php
require "connexion_bdd.php"; 
$db = connexionBase();

$pro_id = $_GET['id'];
$ref = $categorie = $libelle = $description = $prix = $stock = $couleur = $block = $photo = $dateAjout = $dateModif = "";

$requete = "SELECT * FROM produits
JOIN categories ON cat_id = pro_cat_id
WHERE pro_id = $pro_id";

$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();

// Verif données + redefinition variables

if (!empty($_POST["submit"])) {
    if (!empty($_FILES["photo"])) {
        var_dump($_FILES);
        if ($_FILES["photo"]["error"] === UPLOAD_ERR_INI_SIZE) {
            echo "fichier trop gros";
        }
        if ($_FILES["photo"]["error"] === UPLOAD_ERR_OK) 
        {
                $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/tiff", "image/png");
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
                    finfo_close($finfo);
                    if (in_array($mimetype, $aMimeTypes)) 
                    {
                        $tmp_name = $_FILES["photo"]["tmp_name"];
                        $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "jarditou_photos/$pro_id.$extension");
                        $pro_id.$extension;
                        $photo = $extension;
                    }
                    else
                    {
                        exit("Type de fichier non autorisé");
                    }
                        
        }
        
    }
    else 
    {
    $photo = $produit->pro_photo;
    }
    if (!empty($_POST['ref']) && preg_match("#[a-zA-Z]{1,10}#", $_POST['ref']))
    {
        $ref = $_POST['ref'];
    }
    else if (empty($_POST['ref'])) {

        $ref = $produit->pro_id;
    }
    if (!empty($_POST['categorie']) && preg_match("#[0-9]{1,10}#", $_POST['categorie'])) 
    {
        $categorie = intval($_POST['categorie']);
    }
    else if (empty($_POST['categorie'])) {
        
        $categorie = $produit->pro_cat_id;
    }
    if (!empty($_POST['libelle']) && preg_match("#[a-zA-Z]{1,200}#", $_POST['libelle'])) 
    {
        $libelle = $_POST['libelle'];
    }
    else if (empty($_POST['libelle'])) {
        
        $libelle = $produit->pro_libelle;
    }
    if (!empty($_POST['description']) && preg_match("#[\D \d]{0,1000}#", $_POST['description'])) 
    {
        $description = $_POST['description'];
    }
    else if (empty($_POST['description'])) {
        
        $description = $produit->pro_description;
    }
    if (!empty($_POST['prix']) && preg_match("#[0-9]{1,6}[.]*[0-9]{0,2}#", $_POST['prix'])) 
    {
        $prix = $_POST['prix'];
    }
    else if (empty($_POST['prix'])){
        
        $prix = $produit->pro_prix;
    }
    if (!empty($_POST['Stock']) && preg_match("#[0-9]{1,11}#", $_POST['Stock'])) 
    {
        $stock = intval($_POST['Stock']);
    }
    else if (empty($_POST['Stock'])) {
        
        $stock = $produit->pro_stock;
    }
    if (!empty($_POST['couleur']) && preg_match("#[a-zA-Z]{0,30}#", $_POST['couleur'])) 
    {
        $couleur = $_POST['couleur'];
    }
    else if (empty($_POST['couleur'])) {
       
        $couleur = $produit->pro_couleur;
    }

    if (!empty($_POST['block'])) 
    {
        if ($_POST['block'] != 0)
        $block = intval($_POST['block']);
        else {
            $block = null;
        }
    }
    else if (empty($_POST['block'])){
        $block = $produit->pro_bloque;
    }

    if (!empty($_POST['d-ajout']) && preg_match("#\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}#", $_POST['d-ajout'])) 
    {
        $dateAjout = $_POST['d-ajout'];
    }
    else if (empty($_POST['d-ajout'])) {
        
        $dateAjout = $produit->pro_d_ajout;
    }

    if (!empty($_POST['d-modif']) && preg_match("#\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}#", $_POST['d-modif'])) {
        $dateModif = $_POST['d-modif'];
    }
    else {
        echo "Erreur, date modif";
    }
}

//Modification du produit dans la bdd
    //Requete
$reqUp = "UPDATE produits SET pro_ref = ?, pro_cat_id = ?, pro_libelle = ?, pro_description = ?, pro_prix = ?, pro_stock = ?, pro_couleur = ?, pro_photo = ?, pro_d_modif = ?, pro_bloque = ? 
WHERE produits.pro_id = $pro_id;";

// Execution de la requete de modification 

    try {
        $stmt = $db->prepare($reqUp);

        $stmt->execute(array($ref, $categorie, $libelle, $description, $prix, $stock, $couleur, $photo, $dateModif, $block));
    }

    catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
     }

 //Redirection    
     header("Location:Index.php");
    
?>