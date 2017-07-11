<?php

    session_start();

    $user = $_SESSION['name'];


    include "../models/functions.php";


    if ( isset( $_POST['post']) ){

        
        $post = htmlspecialchar($_POST['post']);
        $sujet = htmlspecialchar($_POST['sujet']);
        
        $connect = new pdo_connect();
        $control = $connect -> postSend ($user, $post, $sujet );
        
        
    header("location:../index.php?page=post&sujet=$sujet");

    }


?>