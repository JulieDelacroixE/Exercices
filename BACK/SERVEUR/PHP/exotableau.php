<?php 

echo '<h2>Exerice 1</h2><br>';
$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
     "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
     "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
    );

$b = $a["19002"];

echo 'La validation du groupe 19002 sera à la ' . array_search("Validation", $b) .'ème semaine';

echo '<br><h2> Exercice 2</h2>';

$c = $a["19001"];
var_dump($c);

echo '<br><h2>Exercice 3</h2>';
    $sa = [];
    $sa[] = array_keys($a);
    var_dump($sa);

    echo '<br><h2>Exercice 4</h2><br>';



$d = $a["19003"];
    $e = array_count_values($d);
    $f = 'Stage';
    echo $e['Stage'];

  ?>

  