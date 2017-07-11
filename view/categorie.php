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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <div>
        <? include "nav.php";  ?>
    </div>
    
    <div>
        <p>Bienvenue <?php  echo $user;  ?></p>
    </div>

    <div>
        <?php

        $connect = new pdo_connect();
        $selectCat = $connect -> selectCategorie();
        

        $nbre = count($selectCat);

        for ($i = 0 ; $i < $nbre; $i++){

            foreach($selectCat[$i] as $key => $value){
                echo "<a href='index.php?page=sujet&cat=".$value."'>";
                echo $value;
                echo "</a>";
                echo "</br>";
                
            }
        }



        ?>
    </div>  




</body>
</html>