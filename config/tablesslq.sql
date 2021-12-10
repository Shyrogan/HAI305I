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
	idProduit INT PRIMARY KEY,
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
	idCommande VARCHAR(20) PRIMARY KEY,
	dateCommande DATE NOT NULL,
	emailclient VARCHAR(30) REFERENCES Clients(email),
	etat VARCHAR(30) NOT NULL
	
	
);

CREATE TABLE Lignescommandes
(

	idLigneCommande VARCHAR(30) PRIMARY KEY,
	idCommande VARCHAR(30) REFERENCES Commandes(idCommande),
	idProduit VARCHAR(30) REFERENCES Produits(idProduit),
	quantite INT NOT NULL,
	montant INT NOT NULL




);



INSERT INTO Clients VALUES('Valentin.flageollet@hotmail.com', 'Valentin', 'Rouvier', 'azertyuiop123', 'Melin', 'Rue du soleil levant','0781899243');
INSERT INTO Clients VALUES('Abdel.lol@hotmail.com', 'Abdel', 'tificus', 'Player88', 'Paris', 'Rue de la Paix','0781898943');


INSERT INTO Produits VALUES(1, "iphone 6", 'apple', "smatphones", "mieux que l\'iphone 5", 665 ,"img/iphone6.jpg", 250 );
INSERT INTO Produits VALUES(2, "iphone 7", 'apple', "smatphones", "mieux que l\'iphone 6", 865 ,"img/iphone7.jpg", 350 );

INSERT INTO Produits VALUES(3, "Microsoft Surface Pro 5", 'Microsoft', "portables", "mieux que le Surface 4", 565 ,"img/MicrosoftSurface5.jpg", 65 );
INSERT INTO Produits VALUES(4, "Microsoft Surface Pro 6", 'Microsoft', "portables", "mieux que le Surface 5", 765 ,"img/MicrosoftSurface5.jpg", 165 );
INSERT INTO Produits VALUES(5, "Microsoft Surface Pro 7", 'Microsoft', "portables", "mieux que le Surface 6", 935 ,"img/MicrosoftSurface5.jpg", 420 );

INSERT INTO Produits VALUES(6, "Asus Zenbook 13", 'Asus', "portables", "Le plus zen des pc", 480 ,"img/AsusZenbook13.jpg", 220 );
INSERT INTO Produits VALUES(7, "Asus Rog Phone 5", 'Asus', "smatphones", "et oui Asus fait des téléphones", 565 ,"img/AsusRogPhone5.jpg", 667 );
INSERT INTO Produits VALUES(8, "HpElitex3", 'Hp', "smatphones", "et oui Hp fait des téléphones", 499 ,"img/HpElitex3.jpg", 490 );
INSERT INTO Produits VALUES(9, "Hp Spectre x360", 'Hp', "portables", "Térifiant..", 840 ,"img/HpSpectrex360.jpg", 69 );



