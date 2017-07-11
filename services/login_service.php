<?php

    session_start();

    include "../models/functions.php";


    if ( isset( $_POST['user']) && isset( $_POST['pass'])){

        
        $pseudo = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['pass']);  
        $pass = hash("sha256",$password);// 64 caracteres

        $connect = new pdo_connect();
        $control = $connect -> login ($pseudo, $pass);


        if ($control == TRUE){
            $_SESSION['name'] = $pseudo;
            $link = "../index.php?page=categorie";
        }
        else{
            $link = "../index.php?page=accueil";
            $_SESSION['message'] = "Identifiant ou mot de passe invalide.";
        }
        
        
    header("location:$link");

    }


?>