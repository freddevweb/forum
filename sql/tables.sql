DROP DATABASE IF EXISTS EDN_forum;

CREATE DATABASE EDN_forum;

USE EDN_forum;

CREATE TABLE Utilisateur (
	id INT UNSIGNED AUTO_INCREMENT,
	pseudo VARCHAR(100) NOT NULL,
	email VARCHAR(200) NOT NULL,
	uPassword CHAR(40) NOT NULL,  -- le mot de passe sera hashé avec sha1, ce qui donne toujours une chaîne de 40 caractères
    avatar varchar(255),
    dateInscription date,
    
	PRIMARY KEY(id)
);

CREATE TABLE Categorie (
	id INT UNSIGNED AUTO_INCREMENT,
	nom VARCHAR(150) NOT NULL,
    photo varchar(255),
    
	PRIMARY KEY(id)
);

CREATE TABLE Sujet (
	id INT UNSIGNED AUTO_INCREMENT,
    categorie_id int unsigned not null,
    auteur_id INT UNSIGNED NOT NULL,
    titre varchar(255) not null, 
    def text not null,
    dateCreation datetime,
    
	PRIMARY KEY(id)
);




CREATE TABLE Post (
	id INT UNSIGNED AUTO_INCREMENT,
    sujet_id int unsigned not null,
    auteur_id INT UNSIGNED NOT NULL,
	titre VARCHAR(200) NOT NULL,
	resume TEXT,
	contenu TEXT NOT NULL,
	date_publication DATETIME NOT NULL,
    
	PRIMARY KEY(id)
);



-- Clés étrangères

ALTER TABLE Post 
ADD CONSTRAINT fk_sujet_post FOREIGN KEY (sujet_id) REFERENCES Sujet(id);

ALTER TABLE Post 
ADD CONSTRAINT fk_auteur_post FOREIGN KEY (auteur_id) REFERENCES Utilisateur(id);

ALTER TABLE Sujet 
ADD CONSTRAINT fk_categorie_sujet FOREIGN KEY (categorie_id) REFERENCES Categorie(id);

ALTER TABLE Sujet 
ADD CONSTRAINT fk_auteur_sujet FOREIGN KEY (auteur_id) REFERENCES Utilisateur(id);

-- Index
CREATE UNIQUE INDEX unique_email
ON Utilisateur(email);

CREATE UNIQUE INDEX unique_pseudo
ON Utilisateur(pseudo);


