<?php

    session_start();

    $user = $_SESSION['name'];

    $sujet = $_POST['sujet'];

    include "../models/functions.php";


    if ( isset( $_POST['titre']) && isset( $_POST['def']) ){

        
        $post = htmlspecialchars($_POST['titre']);
        $def = htmlspecialchars($_POST['def']);

        
        
        $connect = new pdo_connect();
        $control = $connect -> postSend ($user, $post, $sujet );
        

        $target_path = "../assets/suj_img/";


        if (isset($_FILES['image_sujet']) AND $_FILES['image_sujet']['error'] == 0)
        {

            if ($_FILES['image_sujet']['size'] <= 1000000)
            {
            
                $infosfichier = pathinfo($_FILES['image_sujet']['name']);

                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    
                    $newName = $sujet.'.'.$extension_upload;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/suj_img/' . basename($newName));
                    
                    $msg = "Transfert du fichier complété !";
                    
                    $path_avatar = "assets/suj_img/".basename($newName);

                    $connect = new pdo_connect();
                    $savePathAvatar = $connect -> enregistrerAvatar( $name, $path_avatar);
                    
                }
            }else{
                
                $msg = 'Erreur fichier trop gros';
            }
        }else{
            $erreur = $_FILES['avatar']['error'];
            $msg = "Le transfert du fichier a subis une erreur de code $erreur";
        }
    }
    else {
        $msg = "Renseignez les champs du formulaire avant d'envoyer";
    }


    $_SESSION['msg'] = $msg;
    
    header("location:../index.php?page=post&sujet=$sujet");

?>