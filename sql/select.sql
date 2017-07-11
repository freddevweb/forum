SELECT pseudo, email, avatar 
FROM utilisateur 
WHERE id = (SELECT id FROM utilisateur WHERE pseudo = "alfonso" );










   
select email from utilisateur where id = (select id from utilisateur where pseudo = "Alfonso");

# element de l'utilisateur pour le profil et modif profil
select pseudo, email, uPassword, avatar, dateInscription  from Utilisateur where id = '';

# elements dans l'accueil du profil
select pseudo, avatar from Utilisateur where id = '';

# menu Categorie
select nom, photo from Categorie;

# dernier sujets par categorie
select titre, def, dateCreation 
from Sujet 
where categorie_id = (
	select id from Categorie where nom = '') -- categorie precedente
    ORDER by dateCreation DESC
    LIMIT 4
    ; 
    
# menu sujet
select titre, def, dateCreation, photo  
from Categorie 
where categorie_id = (
	select id from Categorie where nom = '');




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
    photo varchar(255),
    
	PRIMARY KEY(id)
);
