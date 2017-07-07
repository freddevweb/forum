<?php


    //include "../models/functions.php";

    var_dump($_POST);
/*
    $avatar = $_POST['avatar'];
    var_dump($avatar);
    die();



    if(!empty($_POST['pseudo']) &&  !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['passConfirm']) ){
        $pseudo = $_POST['pseudo'] ;
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passconfirm = $_POST['passConfirm'];

        $pseudoLength = count($pseudo);
        $regex = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';

        
        if ( $pseudoLength > 4 ){
            if (preg_match($regex) == $email) {
                if($passconfirm == $pass){

                    $connect = new pdo_connect();
                    $record = $connect -> enregistrer($pseudo, $email, $pass);

                    if(   $avatar == '' ){

                        $msg = "&msg=ok";
                        $header = "location:index.php?page=avatar";
                    }
                    else {
                        $msg = "&msg=ok";
                        $header = "location:index.php?page=accueil";
                    }
                }
                
            }
        }
    }
    else {
        $msg = "&msg=err";
    }



    header("$header.$msg");*/

?>
   

















