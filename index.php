<?php 

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
            case 'categorie' :
                /* Alfonso: il faudrait faire ici tes appels de categories
                 * $pdo = new connect_pdo()
                 * $selectCat = $pdo->selectCategorie()
                 *
                 * C'est le contrôleur qui gère ce genre d'appel. On ne doit pas les voir dans les vues
                 * */
                include("view/categorie.php");
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
        }




?>