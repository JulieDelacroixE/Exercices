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

$tri = "";

    if(isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    }
    else {
    $currentPage = 1;
    }
    if(isset($_GET["tri"])) {
        
        $tri = $_GET["tri"];    
    }
    else {
        $tri = "pro_id";
    }

    

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion
    $sql = "SELECT COUNT(*) AS `nb_produits` FROM produits";
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetch();

    $nbProduits = (int) $result['nb_produits'];
    $parPage = 7;
    $nbPages = ceil($nbProduits / $parPage);
    $premierProduit = ($currentPage * $parPage) - $parPage;

    $requete = "SELECT * FROM produits ORDER BY $tri LIMIT :premier, :parPage";

    $result = $db->prepare($requete);
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
    ?>

<br><a href="produits_ajout.php" class="btn btn-dark mb-2" role="button">Nouveau</a><br>
<table class="table table-striped table-bordered m-auto">
    <thead>
        <tr class="table-active h4">
            <th scope="col">Photo</th>
            <th scope="col">ID
                <a class="bouton-tri text-dark" href="tableau.php?tri=<?=$tri = "pro_id";?>&amp;page=<?=$currentPage?>" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col">Référence
                <a class="bouton-tri text-dark " href="tableau.php?tri=<?=$tri = "pro_ref";?>&amp;page=<?=$currentPage?>" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col">Libellé
            <a class="bouton-tri text-dark " href="tableau.php?tri=<?=$tri = "pro_libelle";?>&amp;page=<?=$currentPage?>" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col">Prix
            <a class="bouton-tri text-dark " href="tableau.php?tri=<?=$tri = "pro_prix";?>&amp;page=<?=$currentPage?>" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col d-inline">Couleur</th>
            <th scope="col justify-content-between ">Ajout
            <a class="bouton-tri text-dark " href="tableau.php?tri=<?=$tri = "pro_d_ajout";?>&amp;page=<?=$currentPage?>" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col">Modif
            <a class="bouton-tri text-dark " href="tableau.php?tri=datemodif" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
            <th scope="col">Bloqué
            <a href="tableau.php?tri=bloque" class="text-dark" ><svg width="0.7em" height="1em" viewBox="0 0 16 16" class="bi bi-sort-alpha-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 14a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-1 0v11a.5.5 0 0 0 .5.5z"/>
                    <path fill-rule="evenodd" d="M6.354 4.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L4 3.207l1.646 1.647a.5.5 0 0 0 .708 0z"/>
                    <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
                </svg></a>
            </th>
        </tr>
    </thead>
<?php
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
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="Tableau.php?tri=<?= $tri?>&amp;page=<?= $currentPage - 1?>">Précédent</a></li>
        <?php for ($page = 1; $page <= $nbPages; $page++) { ?>
        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>"><a class="page-link" href="Tableau.php?tri=<?= $tri?>&amp;page=<?= $page ?>"><?= $page ?></a></li>
        <?php } ?>
        <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>"><a class="page-link" href="Tableau.php?tri=<?= $tri?>&amp;page=<?= $currentPage +1?>">Suivant</a></li>
    </ul>
    
</nav>
</div>

<?php 
    include("footer.php");
?>