<?php
    if($connected === FALSE){
        header("location:index.php?page=accueil");
    }
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
    
    <section class="container">
        <div>
            <p>Bienvenue <?php  echo $user;  ?></p>
        </div>

        <div class="jumbotron">

            <div class="row">
                <h2 class="text-center">Liste des catégories</h2>
                <?php
                    for ($i = 0 ; $i < $nbre; $i++){
                        
                        ?>
                        <div class="col-lg-3">
                            <a href=<? echo '"index.php?page=sujet&cat='.$selectCat[$i]['nom'].'"'?>>
                                <h3><? echo $selectCat[$i]['nom'] ?><h3>
                            </a>
                        </div>
                        <?php
                    }

                ?>
            </div>
        </div> 
    </section>



</body>
</html>