<?php 


//////////   !!!!!!!   not responsive -> only large screen (17')



/*

    * faire verif si loggé pour pas faire d'inscription
    * faire la page profil pour modifier les données utilisateur
    * cacher les inputs qui ne doivent pas etre montrés
    * indiquer en chemin type arbo le groupe et le sujet

*/

session_start();


include_once("models/functions.php"); // appelle la page fonction

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
                include("view/categorie.php");
                break;
            case 'sujet' :
                include("view/sujet.php");
                break;
            case 'post' :
                include("view/post.php");
                break;
            case 'profil' :
                include("view/profil.php");
                break;
        }




?>