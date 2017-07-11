<?php

    $user = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div>
        <p>Bienvenue <?php  echo $user;  ?></p>
    </div>

    <div>
        <?php
        /* Alfonso: plutot que d'appeler l'objet ici je l'aurai fait depuis le controleur (index.php)
         * j'aurai mit le tout dans une variable selectCat
         * */
        $connect = new pdo_connect();
        $selectCat = $connect -> selectCategorie();

        


        echo $cat;


        ?>
    </div>  




</body>
</html>