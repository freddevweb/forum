DROP DATABASE IF EXISTS EDN_forum;

CREATE DATABASE EDN_forum;

USE EDN_forum;



/*
* Alfonso: comme on a commenté sur le password. Effectivement il doit être hashé pour ne pas
* Être reconnaissable même si on a accès à la base. SHA1 n'est plus un standard cependant car il n'est
* plus considéré comme sur
* dans mon cas j'utilise la fonction hash("sha256",$password) qui génère 64 caractêres.

*  Dans ce dossier SQL pense à me faire un petit backup (Dans Mysql workbench dans le menu
*  MANAGEMENT sur la gauche "Data Export" comme ça j'aurai qu'un fichier SQL a lancé
*  Tes bases SQL sont solides je te laisse faire un peu plus de code avant de pouvoir commenter
*  un peu plus sur le code
*
*  Observation: n'essaie pas trop de faire de requête en avance et plutot essaie de les faire
*  Au fûr et à mesure que tu en as besoin
*/

/*********************************
 * Alfonso Update: Essaie de tout me dumper sur un seul fichier SQL quand tu feras ton backup
*/

CREATE TABLE Utilisateur (
	id INT UNSIGNED AUTO_INCREMENT,
	pseudo VARCHAR(100) NOT NULL,
	email VARCHAR(200) NOT NULL,
	uPassword CHAR(100) NOT NULL,  
    avatar varchar(255),
    dateInscription date,
    
	PRIMARY KEY(id)
);

CREATE TABLE Categorie (
	id INT UNSIGNED AUTO_INCREMENT,
	nom VARCHAR(150) NOT NULL,
    
	PRIMARY KEY(id)
);

CREATE TABLE Sujet (
	id INT UNSIGNED AUTO_INCREMENT,
    categorie_id int unsigned not null,
    auteur_id INT UNSIGNED NOT NULL,
    titre varchar(255) not null, 
    def text not null,
    photo varchar(255),
    dateCreation datetime,
    
	PRIMARY KEY(id)
);




CREATE TABLE Post (
	id INT UNSIGNED AUTO_INCREMENT,
    sujet_id int unsigned not null,
    auteur_id INT UNSIGNED NOT NULL,
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

CREATE UNIQUE INDEX unique_nom
ON Categorie(nom);




INSERT INTO Utilisateur (pseudo, email, uPassword, avatar, dateInscription) VALUES
('Pierre', 'Pierre@email.com', '0557fca5f57f060f2e4b804cbd8d59a125e6066652b8e6fc1dda265935e0db83', '' , '2010-04-02' ),
('Paul', 'Paul@email.com', '0557fca5f57f060f2e4b804cbd8d59a125e6066652b8e6fc1dda265935e0db83', '' , '2010-04-02'),
('Alfonso', 'Alfonso@email.com', 'f58ed1e2df2863f580a31c0d15473852c762037f8536de12a03cf9c624e440b9', 'assets/avatar/Alfonso.jpg' , '2010-04-02'),
('Fred', 'Fred@email.com', '8683c59d89353ec111a2cca2704a60d3f151d59657e8d32bae2fc12b710bc1fb', '' , '2010-04-02');

-- Insertion de categories

INSERT INTO categorie (nom) VALUES
('HTML/css'),
('Bootstrap'),
('Git'),
('Gulp vs Grunt'),
('JavaScript'),
('PHP'),
('MySql'),
('Ski');



insert into Sujet ( categorie_id, auteur_id, titre, def, photo, dateCreation) values
(1, 1, 'le html/css pour les null', 'Cour présentant les doux amis du developpeur : le HTML et le CSS','assets/suj_img/html5-css3.png', '2010-04-02 15:28:22'),
(4, 1, 'Gulp the best', 'Utiliser gulp c\'est mieux que grunt n\'est ce pas alfonso ?' ,'assets/suj_img/featured.gif', '2010-04-02 15:28:22'),
(6, 2, 'PHP objet','PHP Objet vous allez transpirer du sang !!!','assets/suj_img/PHP.png', '2010-04-02 15:28:22'),
(8, 4, 'On ski où ces vacances ?', ' Possibilités : Argentine, Alpes, Népal, si vous avez d\'autres suggestions ...' ,'assets/suj_img/ski.jpg', '2010-04-02 15:28:22'),
(7, 3, 'Le sql pour les dingues', 'Utilisation des transactions et des triggers, conseption avancée des regex complexes AHAHAH' ,'assets/suj_img/sql.png', '2010-04-02 15:28:22');






