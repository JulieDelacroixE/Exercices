 <?php 

echo '<h2>Exercice 1 <br></h2>';
for ($a = 0; $a <= 150; $a++) {
    if ($a%2 != 0) {
        echo $a.' ';
    }
}
echo "<br>";
echo '<h2>Exercice 3 <br></h2>';
for ($c = 0; $c <= 12; $c++) {
    for ($d = 0; $d <= 12; $d++){
        echo $c*$d . ' ';
    }
    echo '<br>';
}
echo '<h2>Exercice 2 <br></h2>';
for ($b = 0; $b <= 500; $b++) {
    echo "Je dois faire des sauvegardes régulières de mes fichiers. <br>";
}
  ?>