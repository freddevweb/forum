<?php

    $user = $_SESSION['name'];
    $cat = $_GET['cat'];

    $connect = new pdo_connect();
    $connected = $connect -> isConnected($user);


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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div>
        <? include "nav.php";  ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-2">  <!--menu latéral-->
                    <div class="row">
                        <div class="col-lg-12">
                            <legend>Catégories :</legend>
                            <?php

                            $connect = new pdo_connect();
                            $selectCat = $connect -> selectCategorie();
                            

                            $nbreCat = count($selectCat);

                            echo '<ul class="list-unstyled">';

                            for ($i = 0 ; $i < $nbreCat; $i++){

                                foreach($selectCat[$i] as $key => $value){
                                    echo "<li><a href='index.php?page=sujet&cat=".$value."'>";
                                    echo "<h4><strong>".$value."</strong></h4>";
                                    echo "</a></li>";
                                    
                                }
                            }

                            echo "</ul>";

                            ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <form enctype="multipart/form-data" action="services/sujet_service.php" method="post" class="col-lg-12">
                                <legend>Créer un sujet</legend>
                                <div class="form-group">
                                    <label for="titre">Titre : </label>
                                    <input type="text" id="titre" name="titre" required class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="def">Description</label>
                                    <textarea type="text" id="def" name="def" required class="form-control"></textarea> 
                                </div>
                                
                                <label for="img">Ajouter une image</label>
                                <input type="file" id="img" name="image_sujet" class="form-control" />
                                

                                <input type="text" name="sujet" value="<? echo $cat ?>" class="hidden">

                                <br />
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-send"></span> Envoyer 
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <span class="glyphicon glyphicon-erase"></span> Réinitialiser 
                                        </button>
                                    </a>
                                </div>
                                
                            </form>
                        </div>

                    </div>

                </div>  

                <div class="col-lg-8"> <!--corp de page-->
                    <div class="row">
                        <div class="jumbotron">

                            <?php

                                $connect = new pdo_connect();
                                $selectSujetCat = $connect -> selectSujet($cat);
                                
                                

                                $nbreSuj = count($selectSujetCat);

                                if($nbreSuj != 0 ){

                                    for ($j = 0 ; $j < $nbreSuj; $j++){

                                        foreach($selectSujetCat[$j] as $key => $value){
                                            if ($key == 'titre'){
                                                echo "<a href='index.php?page=post&sujet=".$value."'>";
                                                echo $value;
                                                echo "</a>";
                                            }
                                            else if ($key == 'photo'){
                                                echo '<img src="'.$value.'" />';
                                            }
                                            else {
                                                echo "</br>";
                                                echo $key;
                                                echo "</br>";
                                                echo $value;
                                                echo "</br>";
                                            }
                                            
                                        }
                                    }
                                }
                                else {
                                    echo "Il n'y a aucun sujet à afficher";
                                    echo "</br>";
                                    echo "Créez en un !";
                                }
                                

                            ?>


                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>
</body>
</html>