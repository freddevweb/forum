<nav class="navbar navbar-inverse" role="navigation">   
  <div class="navbar-header">   
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Ecole du Numérique</a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li> <a href="index.php?page=accueil">Accueil</a> </li>
      <li> <a href="index.php?page=categorie">Catégories</a></li> 
      <li> <a href="index.php?page=profil">Profil</a> </li>
      <li> 
        <a href="services/kill_session_service.php" title="Log out">
          <span class="glyphicon glyphicon-log-out"></span>
        </a> 
      </li>
    </ul>
    
    <form class="navbar-form navbar-right" role="form">
      <div class="input-group">
        <input type="text" style="width:150px" class="input-sm form-control" placeholder="Recherche">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
          </span>
      </div>
    </form>
  </div>
</nav>