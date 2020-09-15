DROP DATABASE if EXISTS eval;
CREATE DATABASE eval;
USE eval;

CREATE TABLE CLIENT (
cli_num INT,
cli_nom VARCHAR(50),
cli_adresse VARCHAR(50),
cli_tel VARCHAR(30),
CONSTRAINT client_pk PRIMARY KEY (cli_num)
);

CREATE TABLE produit (
pro_num INT,
pro_libelle VARCHAR(50),
pro_description VARCHAR(50),
CONSTRAINT produit_pk PRIMARY KEY (pro_num)
);

CREATE TABLE commande (
com_num INT,
cli_num INT,
com_date DATETIME,
com_obs VARCHAR(50),
CONSTRAINT commande_pk PRIMARY KEY (com_num),
CONSTRAINT commande_fk FOREIGN KEY (cli_num) REFERENCES CLIENT(cli_num)
);

CREATE TABLE est_compose (
com_num INT,
pro_num INT,
est_qte INT, 
CONSTRAINT est_compose_pk PRIMARY KEY (com_num, pro_num),
CONSTRAINT est_compose_fk1 FOREIGN KEY (com_num) REFERENCES commande(com_num),
CONSTRAINT est_compose_fk2 FOREIGN KEY (pro_num) REFERENCES produit(pro_num)
);

CREATE INDEX nom
ON CLIENT(cli_nom);