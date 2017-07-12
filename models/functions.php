<?php


    function getPage(){
        if ( isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else {
            $page = 'accueil';
        }
        return $page;
    }


    
    
    class pdo_connect
    {
        // connexion a la base de donnée
        private function init(){

            /* Alfonso: bien vu pour l'objet pour les crédentiel on aurait peut-être du les
             * mettre dans un fichier à part et ne pas les pusher pour que tout le monde ne les vois pas
             * par contre pour ce projet tu peux les garder ici
             *
             * pour la connexion tu pourrais déclarer une variable privée dans l'objet
             * et t'en servir à chaque fois.
             * */
            $connexion = new PDO('mysql:host=localhost:8889;dbname=EDN_forum;charset=utf8', 'root', 'root');
            $connexion->query("EDN_forum");

            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

            return $connexion;
        }


        public function enregistrer( $pseudo, $email, $pass){
            
            $connexion = $this->init();

            $pdo = $connexion -> prepare ("INSERT INTO Utilisateur SET pseudo =:pseudo, email=:email, uPassword=:pass, dateInscription=NOW()");
            $pdo->execute(array(
                'pseudo' => $pseudo,
                'email' =>$email,
                'pass'=>$pass               
            ));
        }


        public function controlPseudo( $pseudo){
            

            $connexion = $this->init();

            $object = $connexion->prepare('SELECT email FROM Utilisateur where pseudo = :pseudo');
            $object->execute( array( 'pseudo' => $pseudo ) );

            $control = $object->fetch();
            
            return $control;
        }


        public function login ($pseudo, $pass){

            $connexion = $this->init();

            $getPass = $connexion->prepare('SELECT uPassword FROM Utilisateur where pseudo = :pseudo');
            $getPass ->execute( array( 'pseudo' => $pseudo ) );

            $passctrl = $getPass -> fetch();

            if (hash("sha256", $pass) ==  $passctrl['uPassword']){
                $flagsession = TRUE;
            }
            else{
                $flagsession = FALSE;
            }

            return $flagsession;

        }


        public function enregistrerAvatar( $pseudo, $avatar){

            $connexion = $this->init();

            $pathAvatar = $connexion -> prepare ("UPDATE Utilisateur SET avatar=:path_avatar where pseudo=:user");
            $pathAvatar -> execute(array(
                'path_avatar' => $avatar,
                'user' => $pseudo
            ));
        }


        public function selectCategorie(){

            $connexion = $this->init();

            $categorie = $connexion -> prepare ("SELECT nom FROM Categorie ORDER BY nom");
            $categorie -> execute();

            $cat = $categorie->fetchAll(PDO::FETCH_ASSOC);

            return $cat;

        }


        public function selectSujet($cat){

            $connexion = $this->init();

            $sujet = $connexion -> prepare (
                "SELECT s.titre, s.def, s.photo, s.dateCreation, u.pseudo, u.avatar
                 FROM Sujet AS s
                    INNER JOIN Utilisateur AS u ON u.id=s.auteur_id 
                WHERE categorie_id = (SELECT id FROM Categorie WHERE nom = :nom ) ORDER BY dateCreation DESC");
            $sujet -> execute(array(
                'nom' => $cat,
            ));

            $suj = $sujet->fetchAll(PDO::FETCH_ASSOC);

            return $suj;

        }


        public function selectSujetByTitre($sujetNom){

            $connexion = $this->init();

            $sujet = $connexion -> prepare (
                "SELECT s.titre, s.def, s.photo, s.dateCreation, u.pseudo, u.avatar FROM Sujet AS s INNER JOIN Utilisateur AS u ON u.id=s.auteur_id WHERE s.id = (SELECT id FROM Sujet WHERE titre = :nom )");
            $sujet -> execute(array(
                'nom' => $sujetNom,
            ));

            if (!empty($sujet)){
                $suj = $sujet->fetchAll(PDO::FETCH_ASSOC);
                return $suj;
            }
            else {
                return;
            }

        }
        

        public function selectPost($sujet){

            $connexion = $this->init();

            $post = $connexion -> prepare ("SELECT p.titre, p.contenu, p.date_publication, u.pseudo, u.avatar FROM Post AS p INNER JOIN Utilisateur AS u ON u.id = p.auteur_id WHERE sujet_id = (SELECT id FROM Sujet WHERE titre = :titre ) ORDER BY p.date_publication");
            $post -> execute(array(
                'titre' => $sujet
            ));
            
            $getPpost = $post->fetchAll(PDO::FETCH_ASSOC);
            return $getPpost;
            
        }


        public function postSend ($user, $post, $sujet ){

            $connexion = $this->init();

            $sendPost = $connexion -> prepare ("INSERT INTO Post SET sujet_id = (SELECT id FROM Sujet WHERE titre = :sujet), auteur_id = (SELECT id FROM Utilisateur WHERE pseudo = :user), contenu = :msg, date_publication = NOW()");
            $sendPost -> execute(array(
                'user' => $user,
                'msg' => $post,
                'sujet' => $sujet
            ));

        }


        public function getProfil ($user){

            $connexion = $this->init();

            $getuser = $connexion -> prepare ("SELECT pseudo, email, avatar FROM utilisateur WHERE id = (SELECT id FROM utilisateur WHERE pseudo = :pseudo )");
            $getuser -> execute(array(
                'pseudo' => $user
            ));
            
            $userget = $getuser->fetch();
            return $userget;
        }


        public function remplacerProfil($nom, $pseudo, $email, $pass){
            $connexion = $this->init();

            $pdo = $connexion -> prepare ("UPDATE Utilisateur SET pseudo =:pseudo, email=:email, uPassword=:pass, dateInscription=NOW() WHERE id = (SELECT id FROM Utilisateur WHERE pseudo = :nom");
            $pdo->execute(array(
                'pseudo' => $pseudo,
                'email' =>$email,
                'pass'=>$pass,
                'nom'=>$nom
            ));
        }


        public function isConnected ($pseudo){
            $connexion = $this->init();

            $connected = $connexion -> prepare ("SELECT id, email  FROM Utilisateur WHERE pseudo =:pseudo");
            $connected->execute(array(
                'pseudo' => $pseudo,
            ));

            $isConnect = $connected->fetch();
            
            $flagConnection = FALSE;

            if ( !empty($isConnect['id']) && !empty($isConnect['email']) ){

                $flagConnection = TRUE;

            }

            return $flagConnection;

        }





    }
























?>
