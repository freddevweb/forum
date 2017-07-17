<?php

    session_start();

    include "../models/functions.php";


    if ( isset( $_POST['user']) && isset( $_POST['pass'])){

        
        $pseudo = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['pass']);  
        $password = hash("sha256",$password);// 64 caracteres

        $connect = new pdo_connect();
        $control = $connect -> login ($pseudo, $password);

        if ($control == TRUE){
            /**
             * Alfonso:
             * ici j'aurais setter l'id plutôt que le pseudo. ou peut être
             */
            $_SESSION['name'] = $pseudo;
            $link = "../index.php?page=categorie";
        }
        else if ($control == FALSE){
            $link = "../index.php?page=accueil";
            $_SESSION['message'] = "Identifiant ou mot de passe invalide.";
        }
        
        
    header("location:$link");

    }


?>