<?php

    include "../models/functions.php";


    $_SESSION["name"]= 'Alfonso';

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
                echo "Transfert du fichier complété ! <br>";
                
                $path_avatar = "assets/avatar/".basename($newName);

                $connect = new pdo_connect();
                $savePathAvatar = $connect -> enregistrerAvatar( $name, $path_avatar);
                
                

                $link = '';
            }
        }else{
            /* Alfonso: je suppose que ces echo sont temporaires
             * il faut évidemment rapporté ça au user au niveau du formulaire.
             * */
            echo 'Erreur fichier trop gros';
            $link = '';
        }
    }else{
        $erreur = $_FILES['avatar']['error'];
        echo "Le transfert du fichier a subis une erreur de code $erreur";
        $link = '';
    }


?>