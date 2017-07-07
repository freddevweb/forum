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


    
    

























?>
<?php
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


    public function enregistrer( $moi, $quelquun, $email){
        
        $connexion = $this->init();
        

        $pdo = $connexion -> prepare ('INSERT INTO etudiants SET nom =:moi, prenom=:quelquun, email=:email, age=:age, langue=:langue');
        $pdo->execute(array(
            'moi' => $moi,
            'quelquun' =>$quelquun,
            'email'=>$email,
            'age'=>$age,
            'langue'=>$langue
        ));
    }

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
    }





}



?>