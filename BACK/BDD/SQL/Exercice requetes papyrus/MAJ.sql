UPDATE vente
SET prix1 = prix1*1.04 AND prix2 = prix2*1.02
WHERE numfou = 9180

UPDATE entcom
JOIN fournis
ON entcom.numfou = fournis.numfou
SET obscom = '*****'
WHERE satisf <5


SET FOREIGN_KEY_CHECKS=off;
DELETE FROM produit
WHERE codart = 'I110'
SET FOREIGN_KEY_CHECKS=ON;

DELETE FROM entcom
WHERE obscom = ''