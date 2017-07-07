

<?php

var_dump($_POST);


/*
//////////////////////////////////////////////////////////////
/////////////////////////////// fichier
//////////////////////////////////////////////////////////////

$target_path = "uploads/"; // chemin absolu pour creer l'image

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { // faire bouger du fichier temporaire vers la cible

    echo "le fichier ".  basename( $_FILES['uploadedfile']['name']).
        " a été téléchargé";

} else {

    echo "Une erreur est survenu pendant le processus, réessayez plus tard!";

}


die();

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['uploadedfile']) AND $_FILES['uploadedfile']['error'] == 0)
{
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['uploadedfile']['size'] <= 1000000)
    {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['uploadedfile']['name']);

        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            // On peut valider le fichier et le stocker définitivement
            $newName = hash('sha1',$_FILES['uploadedfile']['name']).'.'.$extension_upload;
            move_uploaded_file($_FILES['uploadedfile']['tmp_name'], 'uploads/' . basename($newName));
            echo "Transfert du fichier complété !";
        }
    }else{
        echo 'Erreur fichier trop gros';
    }
}else{
    $erreur = $_FILES['uploadedfile']['error'];
    echo "Le transfert du fichier a subis une erreur de code $erreur";
}

*/
?>