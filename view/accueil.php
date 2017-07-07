

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?php // include("nav.php") ?>
    <div>
        <h1>Ecole du numerique forum</h1>
        
        <div>
            <h3>Se connecter</h3>
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label for="user">Utilisateur</label>
                        </td>
                        <td>
                            <label for="pass">Pass</label>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="user" name="user" />
                        </td>
                        <td>
                            <input type="password" id="pass" name="pass" />
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-log-in"></span> Log in
                            </button>
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>
        <div>
            <a href="index.php?page=signin">
                <p>S'inscrire<p>
            </a>
        </div>
    </div>
    
</body>
</html>