<?php
/**
 * Alfonso: Ces controles et appel en base de données doivent être dans le controleur
 *
 * => note prise en compte !
 */


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
    <div class="container">
        <div class="jumbotron">
            <div class="row text-center">
                           
                <div class="col-lg-12 text-center">
                    
                    <?php
                        if(!empty($selectUser['avatar'])){
                            ?>
                                <img src=<? echo $selectUser['avatar'] ?> />
                            <?php
                        }
                        else {
                            ?>
                                <img src="assets/avatar/default.png">
                            <?php
                        }
                    ?>
                    
                </div>
                
                <div class="col-lg-12">
                    <br />
                    <a href="index.php?page=avatar" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </div>
                <h3 class="lead">-------------------------</h3>
                <div class="col-lg-12 text-center">
                    <ul class="list-unstyled">
                        <li>
                            <h3><? echo $selectUser['pseudo']; ?></h3>
                        </li>
                        <li>
                            <h3><? echo $selectUser['email']; ?></h3>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                            <span class="glyphicon glyphicon-asterisk"></span>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-12 text-center">
                    <br />
                    <a href="index.php?page=modify" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>