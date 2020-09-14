SELECT hot_nom, hot_categorie, hot_ville, sta_nom FROM hotel, station
WHERE sta_id = hot_sta_id;

SELECT hot_nom, hot_categorie, hot_ville, cha_numero FROM hotel, chambre
WHERE cha_hot_id = hot_id;

SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite FROM hotel, chambre
WHERE cha_capacite > 1 AND hot_ville = 'Bretou'
ORDER BY hot_nom, cha_numero;

SELECT res_date, cli_nom, hot_nom FROM reservation
JOIN client
ON res_cli_id = cli_id
JOIN chambre
ON cha_id = res_cha_id
JOIN hotel
ON hot_id = cha_hot_id

SELECT sta_nom, hot_nom, cha_numero, cha_capacite FROM chambre
JOIN hotel
ON hot_id = cha_hot_id
JOIN station
ON hot_sta_id = sta_id

SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF(res_date_fin, res_date_debut) FROM reservation
JOIN client
ON res_cli_id = cli_id
JOIN chambre
ON res_cha_id = cha_id
JOIN hotel
ON cha_hot_id = hot_id
