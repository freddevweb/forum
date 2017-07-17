<?php
    session_start();

    
    include "../models/functions.php";



    $avatar = $_POST['avatar'];
    $erreur = array();

    if(!empty($_POST['pseudo']) &&  !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['passConfirm']) ){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        $passconfirm = htmlspecialchars($_POST['passConfirm']);

        $pseudoLength = strlen($pseudo);

        /**
         * Alfonso: Peut-être ce bazarre regex aurais pu être dans un autre objet.
         * Par exemple dans un objet appelé Helper ou controlHelper{}
         * car tu as pu constater que tu t'en resert dans un autre service
         */

        $regex = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';

        // pseudo sup 4 caracters /////////////////////////////////////////////////////////////////////////////

        if ( $pseudoLength <= 4 ){
            $err3 = 3;
            $erreur[] = $err3;
        }

        // pseudo deja pris ///////////////////////////////////////////////////////////////////////////////////
        $connect = new pdo_connect();
        $control = $connect -> controlPseudo ($pseudo);

        if ($control == TRUE ){
            $err2 = 2;
            $erreur[] = $err2;
        }

        //email is not correct    ///////////////////////////////////////////////////////////////////////////
        if ( !preg_match($regex, $email) ) {
            $err1 = 1;
            $erreur[] = $err1;
        }

        // pass word confirm different ////////////////////////////////////////////////////////////////////////////////
        if($passconfirm != $pass){
            $err0 = 10;
            $erreur[] = $err0;
        }
        
        $link = "../index.php?page=inscription";

    }


     /***
      * Alfonso: très bon controles.
      * comme j'ai dis la dernière fois les contrôles sont cool car ils s'accumule. Il fallait éviter le piège
      * des if imbriqués.
      * */
    if ( empty($erreur) ){

        // pass word hachage ////////////////////////////////////////////////////////////////////////////////
        /**
         * Alfonso: t'avais oublié de rallonger les 64 caractères en base de données.
         */
        $pass = hash(hash("sha256", $pass));

        $connect = new pdo_connect();
        $record = $connect -> enregistrer($pseudo, $email, $pass);

        if(  $avatar == 'on' ){

            $link = "../index.php?page=avatar";
            $_SESSION['name']= $pseudo;
            
        }
        else {
            session_destroy();
            $link = "../index.php?page=accueil";
        }
    }
    else {

        $_SESSION['erreur'] = $erreur;

        $link = "../index.php?page=inscription";
    }


    $_SESSION['erreur'] = $erreur;


    header("location:$link");

?>
   

















