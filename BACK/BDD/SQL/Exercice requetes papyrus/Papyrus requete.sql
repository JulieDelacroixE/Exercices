SELECT NUMCOM FROM entcom
WHERE numfou = '09120'


SELECT DISTINCT numfou FROM entcom
WHERE numcom IS NOT NULL 

SELECT COUNT(numcom), COUNT(distinct fournis.numfou) FROM entcom
JOIN fournis
ON entcom.numfou = fournis.numfou

 
SELECT codart, libart, stkphy, stkale, qteann FROM produit
WHERE stkphy <= stkale AND qteann < 1000

SELECT posfou, nomfou FROM fournis
WHERE posfou LIKE '75%' OR posfou LIKE '78%' OR posfou LIKE '92%' OR posfou LIKE '77%'
ORDER BY posfou DESC, nomfou ASC

SELECT numcom FROM entcom
WHERE MONTH(datcom) = 3 OR MONTH(datcom) = 4

SELECT numcom, datcom FROM entcom
WHERE CAST(datcom AS DATE) = CAST(NOW() AS DATE) AND obscom IS NOT NULL

SELECT numcom, qtecde*priuni AS 'Total' FROM ligcom
WHERE qtecde*priuni > 10000 AND qtecde < 1000

SELECT nomfou, numcom, datcom FROM entcom
JOIN fournis
ON entcom.numfou = fournis.numfou
ORDER BY nomfou

SELECT entcom.numcom, nomfou, libart, qtecde*priuni AS 'total' FROM produit
JOIN ligcom
ON produit.codart = ligcom.codart
JOIN entcom
ON ligcom.numcom = entcom.numcom
JOIN fournis
ON entcom.numfou = fournis.numfou
WHERE obscom LIKE '%urgent%'

SELECT distinct nomfou FROM fournis
JOIN entcom
ON fournis.numfou = entcom.numfou
JOIN ligcom
ON entcom.numcom = ligcom.numcom
WHERE qtecde >= 1


SELECT numcom, datcom FROM entcom
WHERE entcom.numfou = (
SELECT entcom.numfou FROM entcom
WHERE numcom = 70210)


SELECT libart, prix1 FROM vente
JOIN produit
ON produit.codart = vente.codart
WHERE prix1 < (
SELECT min(prix1) FROM vente
JOIN produit 
ON produit.codart = vente.codart
WHERE libart LIKE 'r%')

SELECT vente.numfou, nomfou, vente.codart FROM vente
JOIN produit
ON vente.codart = produit.codart
JOIN fournis
ON vente.numfou = fournis.numfou
WHERE delliv <= 30 AND stkphy <= ((stkale*50)/100)
ORDER BY vente.numfou, vente.codart

