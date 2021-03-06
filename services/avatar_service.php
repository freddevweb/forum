<?php

    include "../models/functions.php";

    $name = $_SESSION['name'];

    $target_path = "../assets/avatar/";


    if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
    {

        if ($_FILES['avatar']['size'] <= 1000000)
        {
        
            $infosfichier = pathinfo($_FILES['avatar']['name']);

            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                
                $newName = $name.'.'.$extension_upload;
                move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/avatar/' . basename($newName));
                $msg = "Transfert du fichier complété ! <br>";
                
                $path_avatar = "assets/avatar/".basename($newName);

                $connect = new pdo_connect();
                $savePathAvatar = $connect -> enregistrerAvatar( $name, $path_avatar);
                
                

                session_destroy();
                $link = "../index.php?page=accueil";
            }
        }else{
            $msg = 'Erreur fichier trop gros';
            $link = "../index.php?page=avatar";
        }
    }else{
        $erreur = $_FILES['avatar']['error'];
        $msg = "Le transfert du fichier a subis une erreur de code $erreur";
        $link = "../index.php?page=avatar";
    }

    $_SESSION['msg'] = $msg;

    header("location:$link");

?>