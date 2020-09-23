<?php

require "connexion_bdd.php"; 
$db = connexionBase();

if(isset($_GET["id"])){
$pro_id = $_GET["id"];
    }

$requete = "DELETE FROM produits WHERE produits.pro_id = ?;";
try {
    $stmt = $db->prepare($requete);
    $id = $pro_id;
    $stmt->execute(array($id));
}
catch (Exception $e) {
   print "Erreur ! " . $e->getMessage() . "<br/>";
}

header("Location:Index.php");
?>