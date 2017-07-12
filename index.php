<?php 


    //////////   !!!!!!!   not responsive -> only large screen (17')



    /*
        * faire le retour des erreurs de modify
        * faire le retour des erreurs de avatar
        * indiquer en chemin type arbo le groupe et le sujet

    */

    session_start();

    /***
    * Alfonso: Attention tous les appels en base de données doivent être fait depuis le controleur
    * plutot que dans les templates (c'est à dire les views)!!!
    *
    *
    * Par exemple:
    *                  $connect = new pdo_connect();
    *                  $selectCat = $connect -> selectCategorie();
    *
    * doit être dans le controleur
    *
    *
    */
    include_once("models/functions.php");

    $user = $_SESSION['name'];

    $connect = new pdo_connect();
    $connected = $connect -> isConnected($user);
    $selectCat = $connect -> selectCategorie();



    $page = getPage();
    
    switch ($page){
            case 'signin' :
                include("view/inscription.php");
            case 'profile' :
                include("view/profile.php");
                break;
            case 'inscription' :
                include("view/inscription.php");
                break;
            case 'avatar' :
                include("view/avatar.php");
                break;
            case 'form' :
                include("view/form.php");
                break;
            case 'accueil' :
                include("view/accueil.php");
                break; 
            case 'categorie' :
                $nbre = count($selectCat);
                include("view/categorie.php");
                break;
            case 'sujet' :
                $cat = $_GET['cat'];
                $nbreCat = count($selectCat);
                $selectSujetCat = $connect -> selectSujet($cat);
                $nbreSuj = count($selectSujetCat);
                include("view/sujet.php");
                break;
            case 'post' :
                $sujet = $_GET['sujet'];
                $nbreCat = count($selectCat);
                $selectSujetCat = $connect -> selectSujetByTitre($sujet);
                $nbreSuj = count($selectSujetCat);
                $selectPost = $connect -> selectPost($sujet);
                $nbrePost = count($selectPost);
                include("view/post.php");
                break;
            case 'profil' :
                include("view/profil.php");
                break;
            case 'modify' :
                include("view/modify.php");
                break;
        }




?>