
<?php 



$ref = $categorie = $libelle = $description = $prix = $stock = $couleur = $block = $dateAjout = $dateModif = "";

// Validation des entrées du formulaire, redéfinition des variables
if (!empty($_POST["submit"])) {
    if (!empty($_POST['ref']) && preg_match("#[a-zA-Z]{1,10}#", $_POST['ref']))
    {
        $ref = $_POST['ref'];
    }
    else {
        echo "Error ref";
    }
    if (!empty($_POST['categorie']) && preg_match("#[0-9]{1,10}#", $_POST['categorie'])) 
    {
        $categorie = intval($_POST['categorie']);
    }
    else {
        echo "Error categorie";
    }
    if (!empty($_POST['libelle']) && preg_match("#[a-zA-Z]{1,200}#", $_POST['libelle'])) 
    {
        $libelle = $_POST['libelle'];
    }
    else {
        echo "Error libelle";
    }
    if (!empty($_POST['description']) && preg_match("#[\D \d]{0,1000}#", $_POST['description'])) 
    {
        $description = $_POST['description'];
    }
    else {
        echo "Error desc";
    }
    if (!empty($_POST['prix']) && preg_match("#[0-9]{1,6}[.]*[0-9]{0,2}#", $_POST['prix'])) 
    {
        $prix = $_POST['prix'];
    }
    else {
        echo "Error prix";
    }
    if (!empty($_POST['Stock']) && preg_match("#[0-9]{1,11}#", $_POST['Stock'])) 
    {
        $stock = intval($_POST['Stock']);
    }
    else {
        echo "Error stock";
    }
    if (!empty($_POST['couleur']) && preg_match("#[a-zA-Z]{0,30}#", $_POST['couleur'])) 
    {
        $couleur = $_POST['couleur'];
    }
    else {
        echo "Error couleur";
    }
    
    if (!empty($_POST['block'])) 
    {
        if ($_POST['block'] != 0) {
            $block = intval($_POST['block']);
        }
        else {
            $block = null;
        }
    }
    else {
        echo "Error block";
    }
    
    if (!empty($_POST['d-ajout']) && preg_match("#\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}#", $_POST['d-ajout'])) 
    {
        $dateAjout = $_POST['d-ajout'];
    }
    else {
        echo "Error ajout";
    }
    
    $photo = "JPG";
}

//Connexion à la base

require "connexion_bdd.php"; 
$db = connexionBase();


// Enregistrement du produit dans la bdd
//Requête
try {
    
    $reqp = "INSERT INTO produits(pro_ref, pro_cat_id, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)
VALUES (:pro_ref, :pro_cat_id, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_d_ajout, :pro_bloque)"; 

$stmt = $db->prepare($reqp);


$stmt->bindValue(':pro_ref', $ref);
$stmt->bindValue(':pro_cat_id', $categorie, PDO::PARAM_INT);
$stmt->bindValue(':pro_libelle', $libelle);
$stmt->bindValue(':pro_description', $description);
$stmt->bindValue(':pro_prix', $prix);
$stmt->bindValue(':pro_stock', $stock, PDO::PARAM_INT);
$stmt->bindValue(':pro_couleur', $couleur);
$stmt->bindValue(':pro_photo', $photo);
$stmt->bindValue(':pro_d_ajout', $dateAjout);
$stmt->bindValue(':pro_bloque', $block, PDO::PARAM_INT);

$stmt->execute();
echo "Formulaire envoyé";

} 


//notifier erreur 
catch(PDOException $e){
    
    echo "Erreur : " . $e->getMessage();
    echo 'N° : ' . $e->getCode() . '<br>';
}


$rqs = "SELECT MAX(pro_id) AS pro_id FROM produits;";
$res = $db->query($rqs);
var_dump($res);
$produit = $res->fetch(PDO::FETCH_OBJ);
var_dump($produit);
echo $produit->pro_id;

if (!$res) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
    }
    
    if ($res->rowCount() == 0) 
    {
        // Pas d'enregistrement
        die("La table est vide");
    }
    

var_dump($_FILES);
if ($_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "imagpng", "image/x-png", "image/tiff", "image/png");
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
        finfo_close($finfo);
        if (in_array($mimetype, $aMimeTypes)) 
        {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);
            move_uploaded_file($_FILES["photo"]["tmp_name"], "jarditou_photos/$produit->pro_id.$extension");
            echo $produit->pro_id.$extension;
        }
        else
        {
            exit("Type de fichier non autorisé");
            }
            
}


$reqU = "UPDATE produits SET pro_photo = ? WHERE pro_id = $produit->pro_id;";

try {
    $stmt2 = $db->prepare($reqU);
    $photo = $extension;
    $stmt2->execute(array($photo));
}

catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
 }

 // renvoi sur la page Index
 header("Location:Index.php");
 


     
?>