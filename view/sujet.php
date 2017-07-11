<?php

    $user = $_SESSION['name'];
    $cat = $_GET['cat'];


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

    <div>  <!--menu latéral-->
        <div>
            <?php

            $connect = new pdo_connect();
            $selectCat = $connect -> selectCategorie();
            

            $nbreCat = count($selectCat);

            for ($i = 0 ; $i < $nbreCat; $i++){

                foreach($selectCat[$i] as $key => $value){
                    echo "<a href='index.php?page=sujet&cat=".$value."'>";
                    echo $value;
                    echo "</a>";
                    echo "</br>";
                    
                }
            }



            ?>
        </div>
        <div>
            <form enctype="multipart/form-data" action="services/sujet_service.php" method="post">
                <label for="titre">Titre : 
                    <br />
                    <input type="text" id="titre" name="titre" required />
                </label>
                <br />
                <label for="def">Description
                    <br />
                    <textarea type="text" id="def" name="def" required ></textarea>
                </label>
                <br />
                <label for="img">Ajouter une image
                    <br />
                    <input type="file" id="img" name="image_sujet" />
                </label>
                <br />
                <input type="text" name="sujet" value="<? echo $cat ?>">
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-send"></span> Envoyer 
                </button>
                <br />                
                <a href="#">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-erase"></span> Réinitialiser 
                    </button>
                </a>

            </tr>
        </table>
    </form>
        </div>
    </div>  

    <div> <!--corp de page-->

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




</body>
</html>