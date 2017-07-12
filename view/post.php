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
    <title><? echo $sujet ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css" />
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

                            <form action="services/post_service.php" method="post">
                                <legend>Commenter :</legend>
                                <div class="form-group">
                                    <label for="post">Post</label>
                                    <textarea type="text" id="post" name="post" required class="form-control" ></textarea>
                                </div>
                                
                                <input type="text" name="sujet" value="<? echo $sujet?>" class="hidden">
                                
                                <button type="submit" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-send"></span> Envoyer 
                                </button>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8"> <!--corp de page-->
                    <div class="row">
                        <div class="jumbotron">

                            <?php

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
                                                                <td><? date( "d/m/Y" ,echo $selectSujetCat[$j]['dateCreation'])?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A :</td>
                                                                <td><? date( "G:i" ,echo $selectSujetCat[$j]['dateCreation'])?></td>
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

                            <?php
                            // posts

                                
                                if($nbrePost != 0 ){
                                    ?>
                                    <div class="separation"> </div>

                                    <?php
                                    for ($k = 0 ; $k < $nbrePost; $k++){
                                        
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-2 text-center">
                                                        <h3><? echo $selectPost[$k]['pseudo']?></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="col-lg-12">
                                                        <?php
                                                            if(!empty($selectPost[$k]['avatar'])){
                                                                ?>
                                                                    <img src=<? echo '"'.$selectPost[$k]['avatar'].'"'?> class="col-lg-12">
                                                                <?php
                                                            }
                                                            else {
                                                                ?>
                                                                    <img src="assets/avatar/default.png" class="col-lg-12">
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ">
                                                    <p><? echo '"'.$selectPost[$k]['contenu'].'"'?></p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <table>
                                                            <tr>
                                                                <td>Publié le :</td>
                                                                <td><? echo $selectPost[$k]['date_publication']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A :</td>
                                                                <td><? echo $selectPost[$k]['date_publication']?></td>
                                                            </tr>
                                                        </table>
                                                </div>
                                                
                                            </div>
                                        </div>  


                                        <?php
                                        
                                    }
                                }
                                else {
                                    echo "Il n'y a aucun post à afficher";
                                    echo "</br>";
                                    echo "Créez en un !";
                                }
                                

                            ?>


                </div>




            </div>
        </div>
    </div>  

    




</body>
</html>