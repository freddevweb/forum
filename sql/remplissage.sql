


INSERT INTO Utilisateur (pseudo, email, uPassword, avatar, dateInscription) VALUES
('Pierre', 'Pierre@email.com', 'mar', '' , '2010-04-02 09:28:22' ),
('Paul', 'Pierre@email.com', 'mar', '' , '2010-04-02 10:45:22'),
('Alfonso', 'Pierre@email.com', 'fernandez', '' , '2010-04-02 11:55:22'),
('Fred', 'Pierre@email.com', 'mas', '' , '2010-04-02 12:10:22');

-- Insertion de categories

INSERT INTO Categorie (nom, photo) VALUES
('HTML/css', ''),
('Bootstrap', ''),
('Git', ''),
('Gulp vs Grunt', ''),
('JavaScript', ''),
('PHP', ''),
('MySql'),
('Ski');



insert into Sujet ( categorie_id, auteur_id, titre, def,  nom, dateCreation, photo) values
(1, 1, 'le html/css pour les null', 'Cour présentant les doux amis du developpeur : le HTML et le CSS', '2010-04-02 15:28:22', ''),
(4, 1, 'Gulp the best', 'Utiliser gulp c\'est mieux que grunt n\'est ce pas alfonso ?' , '2010-04-02 15:28:22', ''),
(6, 2, 'PHP Objet vous allez transpirer du sang !!!', '2010-04-02 15:28:22', ''),
(8, 4, 'On ski où ces vacances ?', ' Possibilités : Argentine, Alpes, Népal, si vous avez d\'autres suggestions ...' , '2010-04-02 15:28:22', ''),
(7, 3, 'Le sql pour les dingues', 'Utilisation des transactions et des triggers, conseption avancée des regex complexes AHAHAH' , '2010-04-02 15:28:22', '');










