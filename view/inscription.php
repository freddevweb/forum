

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <form action="services/inscription_service.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="pseudo">Pseudo : </label>
                </td>
                <td>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Mot de passe : </label>
                </td>
                <td>
                    <input type="password" id="password" name="pass" placeholder="Votre mot de passe" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password1">Confirmer le mot de passe : </label>
                </td>
                <td>
                    <input type="password" id="password1" name="passConfirm" placeholder="Votre mot de passe" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Votre email : </label>
                </td>
                <td>
                    <input type="email" id="email" name="email" placeholder="Votre E-Mail: berthe@pins.fr" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="avatar">Ajouter un avatar : </label>
                </td>
                <td>
                    <input type="checkbox" id="avatar" name="avatar" checked />
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-send"></span> Envoyer 
                    </button>
                </td>
                <td>
                    <a href="#">
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-erase"></span> Réinitialiser 
                        </button>
                    </a>
                </td>
            </tr>
        </table>
    </form>


</body>
</html>
