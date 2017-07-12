<?php
    session_start();

    
    include "../models/functions.php";

    $nom = $_SESSION['name'];

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
        
        $link = "../index.php?page=modify";

        

    }


     
    if ( empty($erreur) ){

        // pass word hachage ////////////////////////////////////////////////////////////////////////////////
        $pass = hash(hash("sha256", $pass));

        $connect = new pdo_connect();
        $record = $connect -> remplacerProfil($nom, $pseudo, $email, $pass);
        $link = "../index.php?page=accueil";
        session_destroy();
    }
    else {

        $_SESSION['erreur'] = $erreur;

        $link = "../index.php?page=modify";
    }


    $_SESSION['erreur'] = $erreur;


    header("location:$link");

?>
   




