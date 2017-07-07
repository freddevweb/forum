

<?php 

// add session

include_once("models/functions.php"); // appelle la page fonction

    $page = getPage();
    
    switch ($page){
            case 'signin' :
                include("view/inscription.php");
            case 'profile' :
                include("view/profile.php");
                break;
            case 'profile' :
                include("view/profile.php");
                break;
            case 'categorie.php' :
                // $user = getUser();
                // $description = getDescription();
                // $text = getMessage();
                // $nbreUtilisateur = getNbreUtilisateur();
                include("view/categorie.php");
                break;
            case 'avatar' :
                include("view/avatar.php");
                break;

            case 'form' :
                // $user = getUser();
                include("view/form.php");
                break;
            case 'accueil' :
                include("view/accueil.php");
                break; 
        }




?>