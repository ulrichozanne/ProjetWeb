<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cashcash;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



?>


<!DOCTYPE html>
<html>
<head>
  <title>Affecter intervention</title>
    <meta charset ="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
     <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="accueil.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="fiche_client.php">Générer une fiche client</a>
        <li class="nav-item">
          <a class="nav-link active" href="affecter_intervention.php">Affecter une intervention</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="consulter_intervention.php">Consulter les interventions</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="contrat.php">Contrats de garantie</a>
          </li>
      </ul>
  </nav>








<?php

$affecterintervention = $bdd->prepare('INSERT INTO intervention(numeroIntervent,dateVisite,heureVisite, numCli, matriculeTec')



session_start();
$_SESSION['id'] = $resultat['id'];
$_SESSION['login'] = $resultat['login'];

?>







  <form method="POST" action="affecter_intervention.php">
    <div class="container contact">
  <div class="row">
    <div class="col-md-3">
      <div class="contact-info">
        <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
        <h2 class="titre_intervention">Ajouter une intervention</h2>
      </div>
    </div>
          <div class="col-md-9">
            <div class="contact-form">
              <div class="form-group">
                <label class="control-label col-sm-2" for="numIntervention">Numéro d'intervention:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="numIntervention" name="numIntervention">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="nom">Nom:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="adresse">Adresse:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="adresse" name="adresse">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="date">Date:</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="heure">Heure:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="heure" name="heure">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="numSerie">Numéro de série:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="numSerie" name="numSerie">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="type">Type de matériel:</label>
                <div class="col-sm-10">
                <select class="form-control" id="type"name="type">
                  <option value="">-- Veuillez choisir le type de matériel --</option>
                  <option value="All in One"> All in one</option>
                  <option value="Souris">Souris</option>
                  <option value="Clavier">Clavier</option>
                  <option value="Casque">Casque</option>
                  <option value="Ecran">Ecran</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="temps">Temps passé:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="temps" name="temps">
                </div>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="commentaire">Commentaire:</label>
                <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="commentaire"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn">Envoyer</button>
                </div>
              </div>
            </div>
      
    </div>
     
  </div>
</div>
</form>

</body>
</html>
