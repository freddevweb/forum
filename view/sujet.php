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

                            <ul class="list-unstyled">
                            <?php

                                for ($i = 0 ; $i < $nbreCat; $i++){

                                    foreach($selectCat[$i] as $key => $value){
                                        ?>
                                            <li>
                                                <a href=<?php echo '"index.php?page=sujet&cat='.$value.'"' ?>>
                                                    <h4>
                                                        <strong>
                                                            <?php echo $value; ?>
                                                        </strong>
                                                    </h4>
                                                </a>
                                            </li>
                                        <?php
                                        
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <br />
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
                            /***
                             * Alfonso: plutot que d'utiliser des echo il faut jouer avec les balises PHP
                             * pour pas avoir pa faire de écho. Le problème avec les echos c'est aussi qu'on a pas
                             * l'IDE qui peut nous corriger vu que c'est dans le PHP
                             *
                             * aussi avoir des echo dans une page c'est moche!
                             *
                             * ==> corrigé, j'espere que c'est bien indenté car j'ai eu du mal!

                             */
                                if($nbreSuj != 0 ){
                                    for ($j = 0 ; $j < $nbreSuj; $j++){
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-9">
                                                        <a href=<? echo '"index.php?page=post&sujet='.$selectSujetCat[$j]['titre'].'"'?> class="text-center">
                                                            <h3><? echo $selectSujetCat[$j]['titre']?></h3>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <table>
                                                            <tr>
                                                                <td>Publié le :</td>
                                                                <td><? echo date( "d/m/Y" ,$selectSujetCat[$j]['dateCreation'])?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A :</td>
                                                                <td><? echo date( "G:i" ,$selectSujetCat[$j]['dateCreation'])?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 ">
                                                    <a href=<? echo '"index.php?page=post&sujet='.$selectSujetCat[$j]['titre'].'"'?>>
                                                        <img src=<? echo '"'.$selectSujetCat[$j]['photo'].'"'?> class="col-lg-12">
                                                    </a>
                                                </div>
                                                <div class="col-lg-7">
                                                    <p><? echo '"'.$selectSujetCat[$j]['def'].'"'?></p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="col-lg-12">Par :</p>
                                                    <p class="col-lg-12 text-center"><? echo $selectSujetCat[$j]['pseudo']?></p>
                                                    <div class="col-lg-12 text-center">
                                                    <?php
                                                        if(!empty($selectSujetCat[$j]['avatar'])){
                                                            ?>
                                                                <img src=<? echo '"'.$selectSujetCat[$j]['avatar'].'"' ?>  class="col-lg-8 col-lg-offset-2"/>
                                                            <?php
                                                        }
                                                        else {
                                                            ?>
                                                                <img src="assets/avatar/default.png" class="col-lg-8 col-lg-offset-2">
                                                            <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php 
                                    }
                                }
                            
                            else {
                                ?>
                                    <div class="row">
                                        <h4>Il n'y a aucun sujet à afficher</h4>
                                        <h4>Créez en un !</h4>
                                        <br/>
                                    <div>
                                <?php
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