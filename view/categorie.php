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

        $connect = new pdo_connect();
        $selectCat = $connect -> selectCategorie();
        
        var_dump ($selectCat);
        echo " x <br>";
        var_dump ($selectCat[0]);
        echo " 0 <br>";
        var_dump ($selectCat[1]);
        echo " 1 <br>";

        ?>
    </div>  




</body>
</html>