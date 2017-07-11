

INSERT INTO Utilisateur (pseudo, email, uPassword, avatar, dateInscription) VALUES
('Pierre', 'Pierre@email.com', 'UWCShvt/YIngoKQYNVlJx5HoSHCuJSMJO6ALs+z/f44=', '' , '2010-04-02' ),
('Paul', 'Paul@email.com', 'UWCShvt/YIngoKQYNVlJx5HoSHCuJSMJO6ALs+z/f44=', '' , '2010-04-02'),
('Alfonso', 'Alfonso@email.com', 'w1hGIKFYJJK5l3ijNDQAVaDTyR7gNfHEQnSY6V0RHO4=', 'assets/avatar/Alfonso.jpg' , '2010-04-02'),
('Fred', 'Fred@email.com', 'hqWeD9rXn1mN//IfY7RiGt6rqflr5u0N88D2F47S5YE=', '' , '2010-04-02');

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










