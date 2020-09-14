CREATE DATABASE hotel_exercice;
USE hotel_exercice;

CREATE TABLE Station(
station_num INT(20) NOT hotelNULL,
station_nom VARCHAR(30) NOT NULL,
CONSTRAINT station_pk PRIMARY KEY (station_num)
);

CREATE TABLE CLIENT(
client_num INT(20) NOT NULL, 
client_nom VARCHAR(30) NOT NULL, 
client_prenom VARCHAR(30) NOT NULL,
client_adresse VARCHAR(100) NOT NULL,
CONSTRAINT client_pk PRIMARY KEY (client_num)
);

CREATE TABLE hotel(
hotel_num INT(20) NOT NULL, 
hotel_nom VARCHAR(50) NOT NULL,
hotel_categorie VARCHAR(50) NOT NULL,
hotel_capacite INT(4) NOT NULL,
hotel_adresse VARCHAR(100) NOT NULL,
CONSTRAINT hotel_pk PRIMARY KEY (hotel_num)
);

CREATE TABLE Chambre(
chambr_capacite INT(2) NOT NULL,
chambr_confort INT (2) NOT NULL,
chambr_exposition VARCHAR (20) NOT NULL,
chambr_type VARCHAR (20) NOT NULL,
chambr_num INT (10) NOT NULL,
chambr_numclient INT(20) NOT NULL,
FOREIGN KEY (chambr_numclient) REFERENCES CLIENT(client_num),
CONSTRAINT chambr_pk PRIMARY KEY (chambr_num)
);

CREATE TABLE Reservation(
reserv_chambrenum INT(10) NOT NULL,
reserv_clientnum INT(20) NOT NULL,
reserv_datedebut DATE NOT NULL,
reserv_datefin DATE NOT NULL,
reserv_datereserv DATE NOT NULL,
reserv_montantarrhes INT(20) NOT NULL,
reserv_prixtot INT(10) NOT NULL,
FOREIGN KEY (reserv_chambrenum) REFERENCES Chambre(chambre_num),
FOREIGN KEY (reserv_clientnum) REFERENCES CLIENT(client_num),
CONSTRAINT reserv_pk PRIMARY KEY (reserv_chambrenum, reserv_clientnum)
);

CREATE USER 'util1'@'%' IDENTIFIED BY '1234'

GRANT ALL PRIVILEGES
ON hotel_exercice.*
TO util1;

CREATE USER 'util2'@'%'IDENTIFIED BY '1234';

GRANT SELECT 
ON hotel_exercice.*
TO util2;

CREATE USER 'util3'@'%' IDENTIFIED BY '1234';

GRANT SELECT 
ON hotel_exercice.station 
TO util3;



INSERT TO ligcom (numcom, numlig, codart, qtecde, priuni, qteliv, derliv)
(70010, 1, 'I100', 3000, 470, 3000, 2007-03-05), (70010, 2, 'I105', 2000, 485, 2000,2007-07-05),
(70010, 3, 'I108', 1000, 680, 1000, 2007-08-20), (70010, 4, 'D035', 200, 40, 250, 2007-02-20), 
(70010, 5, 'P220', 6000, 3500, 6000, 2007-03-31), (70010, 6, 'P240', 6000, 2000, 2000, 2007-03-31),
(70011, 1, 'I105', 1000, 600, 1000, 2007-05-16), (70011, 2, 'P220', 10000, 3500, 10000, 2007-08-31),
(70020, 1, 'B001', 200, 140, 0, 2007-12-31), (70020, 2, 'B002', 200, 140, 0, 2007-12-31),
(70025, 1, 'I100', 1000, 590, 1000, 2007-05-15), (70025, 2, 'I105', 500, 590, 500, 2007-03-15),
(70210, 1, 'I100', 1000, 470, 1000, 2007-07-15), (70250, 1, 'P230', 15000, 4900, 12000, 2007-12-15),
(70250, 2, 'P220', 10000, 3350, 10000, 2007-11-10), (70300, 1, 'I100', 50, 790, 50, 2007-10-31),
(70620, 1, 'I105', 200, 600, 200, 2007-11-01), (70625, 1, 'I100', 1000, 470, 1000, 2007-10-15),
(70625, 2, 'P220', 10000, 3500, 10000, 2007-10-31), (70629, 1, 'B001', 200, 140, 0, 2007-12-31),
(70629, 2, 'B002', 200, 140, 0, 2007-12-31)