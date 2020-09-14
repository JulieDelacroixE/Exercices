SELECT COUNT(*) FROM hotel
JOIN station
ON hot_sta_id = sta_id

SELECT COUNT(*) FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id

SELECT COUNT(*) FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id

SELECT COUNT(*) FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id
WHERE cha_capacite > 1

SELECT hot_nom FROM hotel
JOIN chambre
ON cha_hot_id = hot_id
JOIN reservation
ON res_cha_id = cha_id
JOIN client 
ON res_cli_id = cli_id
WHERE cli_nom = 'Squire'

SELECT AVG( DATEDIFF(res_date_fin, res_date_debut) ), sta_nom FROM reservation
JOIN chambre
ON res_cha_id = cha_id
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON sta_id = hot_sta_id
GROUP BY sta_id