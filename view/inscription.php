

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form action="services/inscription_service.php" method="POST">
        <label>
            Pseudo : 
            <input type="text" name"pseudo" placeholder="Votre pseudo" required />
        </label>
        <label>
            Mot de passe : 
            <input type="password" name"pass" placeholder="Votre mot de passe" required />
        </label>    
        <label>
            Confirmer le mot de passe : 
            <input type="password" name"passConfirm" placeholder="Votre mot de passe" required />
        </label>
        <label>
            Votre email : 
            <input type="email" name"email" placeholder="Votre E-Mail: berthe@pins.fr" required />
        </label>
        <label>
            Ajouter un avatar : 
            <input type="checkbox" name="check" checked />
        </label>
        <input type="submit" value="send">
    </form>



</body>
</html>

    <!--<form action="services/inscription_service.php" method="post">
        <label>
            Pseudo : 
            <input type="text" name"pseudo" placeholder="Votre pseudo" required />
        </label>
        <label>
            Mot de passe : 
            <input type="password" name"pass" placeholder="Votre mot de passe" required />
        </label>    
        <label>
            Confirmer le mot de passe : 
            <input type="password" name"passConfirm" placeholder="Votre mot de passe" required />
        </label>
        <label>
            Votre email : 
            <input type="email" name"email" placeholder="Votre E-Mail: berthe@pins.fr" required />
        </label>
        <label for="avatar">
            Ajouter un avatar : 
            <input type="checkbox" name"avatar" checked />
        </label>
        <button type="submit" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-send"></span> Envoyer 
        </button>
        <a href="#">
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-erase"></span> Réinitialiser 
            </button>
        </a>
    </form>-->
    
