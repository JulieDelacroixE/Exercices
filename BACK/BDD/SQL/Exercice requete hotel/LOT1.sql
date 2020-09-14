SELECT hot_nom, hot_ville FROM hotel;

SELECT cli_nom, cli_prenom, cli_adresse FROM client
WHERE cli_nom = 'White';

SELECT sta_nom, sta_altitude FROM station
WHERE sta_altitude > 1000;

SELECT cha_numero, cha_capacite FROM chambre
WHERE cha_capacite > 1;

SELECT cli_nom, cli_ville FROM client
WHERE NOT (cli_ville = 'Londre');

SELECT hot_nom, hot_ville, hot_categorie FROM hotel
WHERE hot_ville = 'Bretou' AND hot_categorie > 3;
