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

            if ($passctrl['uPassword'] ==  $pass){
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

            $categorie = $connexion -> prepare ("SELECT nom, photo FROM Categorie ORDER BY nom");
            $categorie -> execute();

            $cat = $categorie->fetch();

            return $cat;

        }


        public function selectSujet($cat){

            $connexion = $this->init();

            $sujet = $connexion -> prepare ("SELECT nom, photo FROM Sujet WHERE categorie_id = (SELECT id FROM Categorie WHERE nom = :nom ) ORDER BY dateCreation");
            $sujet -> execute(array(
                'nom' => $cat
            ));

            $cat = $sujet -> fetch();

        }





















/*
    ******************************************
*/
/*
        public function edit ($id=FALSE) {

            $connexion = $this->init();

            if ($id == false ){

                $object = $connexion->prepare('SELECT nom, prenom, email, age, langue, id FROM etudiants ORDER BY nom');
                $object->execute();
                
            }else{
                $object = $connexion->prepare('SELECT nom, prenom, email, age, langue, id FROM etudiants where id=:id');
                $object->execute( array( 'id' => $id ) );

            }

            $etudiants = $object->fetchAll(PDO::FETCH_ASSOC);
            return $etudiants;
        }

        public function todelete ($id){

            $connexion = $this->init();

            $pdo = $connexion -> prepare ('DELETE FROM etudiants where id=:id');
            $pdo->execute(array(
                'id'=>$id
            ));
        }

        public function update ($id, $nom, $prenom, $email, $age, $langue){

            $connexion = $this->init();
            
            $pdo = $connexion -> prepare ('UPDATE etudiants set nom =:moi, prenom=:prenom, email=:email, age=:age, langue=:langue where id=:id');
            $pdo->execute(array(
                'moi' => $nom,
                'prenom' =>$prenom,
                'email'=>$email,
                'age'=>$age,
                'langue'=>$langue,
                'id'=>$id
            ));
        }*/





    }
























?>
