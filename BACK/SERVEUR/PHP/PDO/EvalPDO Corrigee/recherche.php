<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou produit</title>
</head>


<?php include("header.php");?>
<?php

    if(isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    }
    else {
    $currentPage = 1;
    }



    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion

    $recherche = "";
    if (!empty($_POST["submit"])) {
        if (isset($_POST["search"]) && !empty($_POST["search"])) {
            $recherche = htmlspecialchars($_POST["search"]);
        }
    }

    $parPage = 3;
    $premierProduit = ($currentPage * $parPage) - $parPage;
   
    $sql = "SELECT COUNT(*) AS `nb_produits` FROM produits WHERE pro_libelle LIKE :recherche OR pro_description LIKE :recherche ORDER BY pro_id LIMIT :premier, :parPage";
    $query = $db->prepare($sql);
    $query->bindValue(":recherche", "%$recherche%", PDO::PARAM_STR);
    $query->bindValue(":premier", $premierProduit, PDO::PARAM_INT);
    $query->bindValue(":parPage", $parPage, PDO::PARAM_INT);
    $query->execute();
    $resultat = $query->fetch();
    $nbProduits = (int) $resultat['nb_produits'];
    $nbPages = ceil($nbProduits / $parPage);


    $requete = "SELECT * FROM produits WHERE pro_libelle LIKE :recherche OR pro_description LIKE :recherche ORDER BY pro_id LIMIT :premier, :parPage";

    $result = $db->prepare($requete);
    $result->bindValue(":recherche", "%$recherche%", PDO::PARAM_STR);
    $result->bindValue(":premier", $premierProduit, PDO::PARAM_INT);
    $result->bindValue(":parPage", $parPage, PDO::PARAM_INT);
    $result->execute();


    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
       // Pas d'enregistrement
       die("La table est vide");
    }
    echo '<br><a href="produits_ajout.php" class="btn btn-dark mb-2" role="button">Nouveau</a><br>';
    echo '<table class="table table-striped table-bordered m-auto">';
    echo '<thead>
    <tr class="table-active h4">
        <th scope="col">Photo</th>
        <th scope="col">ID</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Libellé</th>
        <th scope="col">Prix</th>
        <th scope="col">Couleur</th>
        <th scope="col">Ajout</th>
        <th scope="col">Modif</th>
        <th scope="col">Bloqué</th>
    </tr>
</thead>';

    while ($row = $result->fetch(PDO::FETCH_OBJ))
    {
        echo '<tr>';
        echo '<td class="table-warning"><img class ="img-fluid" src="src/jarditou_photos/'.$row->pro_id.'.'.$row->pro_photo.'"alt='.$row->pro_libelle.' width="100" height="100"></td>';
        echo '<td>'.$row->pro_id.'</td>';
        echo '<td>'.$row->pro_ref.'</td>';
        echo '<td class="table-warning"><a href="detail.php?id='.$row->pro_id.'" title='.$row->pro_libelle.' style="color: red; text-decoration: underline;">'.$row->pro_libelle.'</a></td>';
        echo '<td>'.$row->pro_prix.'</td>';
        echo '<td>'.$row->pro_couleur.'</td>';
        echo '<td>'.$row->pro_d_ajout.'</td>';
        echo '<td>'.$row->pro_d_modif.'</td>';

        if (is_null($row->pro_bloque)) {
            echo '<td> </td>';
        }
        else {

            echo '<td><span class="bg-danger text-white p-1">BLOQUE</span></td>';
        }
        echo"</tr>";
    }

    echo "</table>"; 
    ?>

<div class="">
<nav class="navbar-expand-sm mt-3">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="recherche.php?search=<?=$recherche?>&&page=<?= $currentPage - 1?>">Précédent</a></li>
        <?php for ($page = 1; $page <= $nbPages; $page++) { ?>
        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>"><a class="page-link" href="recherche.php?search=<?=$recherche?>&&page=<?= $page ?>"><?= $page ?></a></li>
        <?php } ?>
        <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>"><a class="page-link" href="recherche.php?search=<?=$recherche?>&&page=<?= $currentPage +1?>">Suivant</a></li>
    </ul>
    
</nav>
</div>

<?php 
    include("footer.php");
?>