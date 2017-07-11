

# creation user : 
insert into Utilisateur (pseudo, email, uPassword, avatar, dateInscription)
values ('pseudo, email, uPassword, avatar, dateInscription');

insert into Sujet (categorie_id, auteur_id, titre, def, dateCreation, photo)
values ('categorie_id, auteur_id, titre, def, dateCreation, photo');



insert into Post (sujet_id, auteur_id, titre, contenu, date_publication)
values ('sujet_id, auteur_id, titre, contenu, date_publication');




UPDATE Utilisateur SET avatar="assets/avatar/Alfonso.jpg" where pseudo='Alfonso';



