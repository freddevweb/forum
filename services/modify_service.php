<?php
    session_start();

    
    include "../models/functions.php";



    $avatar = $_POST['avatar'];
    $erreur = array();

    if(!empty($_POST['pseudo']) &&  !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['passConfirm']) ){
        $pseudo = $_POST['pseudo'] ;
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passconfirm = $_POST['passConfirm'];

        $pseudoLength = strlen($pseudo);

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


     
    if ( empty($erreur) ){

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
   




