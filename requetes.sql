CREATE TABLE Clients
(
	email VARCHAR(30) NOT NULL,
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL,
	motDePasse VARCHAR(30) NOT NULL,
	ville VARCHAR(30) NOT NULL,
	adresse VARCHAR(30) NOT NULL,
	telephone INT NOT NULL,
	PRIMARY KEY (email)
);

CREATE TABLE Produits
(
	idProduit INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(30) NOT NULL,
	marque VARCHAR(20) NOT NULL,
	categorie VARCHAR(30) NOT NULL,
	descriptif VARCHAR(250) NOT NULL,
	prix INT NOT NULL,
	photo VARCHAR(150),
	stock INT NOT NULL
);

CREATE TABLE Commandes
(
	idCommande INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	dateCommande DATE NOT NULL,
	emailclient VARCHAR(30) REFERENCES Clients(email),
	etat VARCHAR(30) NOT NULL
);

CREATE TABLE LignesCommandes
(
	idLigneCommande INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCommande INT NOT NULL REFERENCES Commandes(idCommande),
	idProduit INT NOT NULL REFERENCES Produits(idProduit),
	quantite INT NOT NULL,
	montant INT NOT NULL
);


INSERT INTO Produits VALUES("iPhone 6", 'Apple', "Smartphone", "Mieux que l\'iPhone 5", 665 ,"img/iphone6.jpg", 250 );
INSERT INTO Produits VALUES("iPhone 7", 'Apple', "Smartphone", "Mieux que l\'iPhone 6", 865 ,"img/iphone7.jpg", 350 );

INSERT INTO Produits VALUES("Microsoft Surface Pro 5", 'Microsoft', "Portable", "mieux que le Surface 4", 565 ,"img/MicrosoftSurface5.jpg", 65 );
INSERT INTO Produits VALUES("Microsoft Surface Pro 6", 'Microsoft', "Portable", "mieux que le Surface 5", 765 ,"img/MicrosoftSurface6.jpg", 165 );
INSERT INTO Produits VALUES("Microsoft Surface Pro 7", 'Microsoft', "Portable", "mieux que le Surface 6", 935 ,"img/MicrosoftSurface7.jpg", 420 );

INSERT INTO Produits VALUES("Asus Zenbook 13", 'Asus', "Portable", "Le plus zen des pc", 480 ,"img/AsusZenbook13.jpg", 220 );
INSERT INTO Produits VALUES("Asus Rog Phone 5", 'Asus', "Smartphone", "Et oui Asus font des téléphones...", 565 ,"img/AsusRogPhone5.jpg", 667 );
INSERT INTO Produits VALUES("HP Elite x3", 'HP', "Smartphone", "Et oui HP font des téléphones...", 499 ,"img/HpElitex3.jpg", 490 );
INSERT INTO Produits VALUES("HP Spectre x360", 'HP', "Portable", "Térifiant..", 840 ,"img/HpSpectrex360.jpg", 69 );

