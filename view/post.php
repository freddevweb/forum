<?php

    $user = $_SESSION['name'];
    $sujet = $_GET['sujet'];

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
</head>
<body>
    <div>
        <? include "nav.php";  ?>
    </div>

    <div>  <!--menu latéral-->
        <div>
            <p>
               <a href="index.php?page=categorie">Categories</a>
            </p>
            <?php

            $connect = new pdo_connect();
            $selectCat = $connect -> selectCategorie();
            

            $nbreCat = count($selectCat);

            for ($i = 0 ; $i < $nbreCat; $i++){

                foreach($selectCat[$i] as $key => $value){
                    echo "<a href='index.php?page=page&cat=".$value."'>";
                    echo $value;
                    echo "</a>";
                    echo "</br>";
                    
                }
            }



            ?>
        </div>
        <div>
            <form action="services/sujet_service.php" method="post">
                <label for="post">Post
                    <br />
                    <textarea type="text" id="post" name="post" required ></textarea>
                </label>
                <input type="text" name="sujet" value="<? echo $sujet?>" class="hidden">
                <br />
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-send"></span> Envoyer 
                </button>
            </tr>
        </table>
    </form>
        </div>
    </div>  

    <div> <!--corp de page-->

        <?php

            // sujet
            $connect = new pdo_connect();
            $selectSujetCat = $connect -> selectSujetByTitre($sujet);

            $nbreSuj = count($selectSujetCat);

            if($nbreSuj != 0 ){

                for ($j = 0 ; $j < $nbreSuj; $j++){

                    foreach($selectSujetCat[$j] as $key => $value){
                        if ($key == 'titre'){
                            echo "<a href='index.php?page=page&sujet=".$value."'>";
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





            // posts

            $connect = new pdo_connect();
            $selectPost = $connect -> selectPost($sujet);
            
            

            $nbrePost = count($selectPost);

            if($nbrePost != 0 ){
                
                for ($k = 0 ; $k < $nbrePost; $k++){

                    foreach($selectPost[$k] as $key => $value){
                    
                        echo "</br>";
                        echo $key;
                        echo "</br>";
                        echo $value;
                        echo "</br>";
                    
                    }
                }
            }
            else {
                echo "Il n'y a aucun post à afficher";
                echo "</br>";
                echo "Créez en un !";
            }
            

        ?>


    </div>




</body>
</html>