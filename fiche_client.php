<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cashcash;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$login = $_POST['login'];
$mdp = $_POST['mdp'];

session_start();
$_SESSION['id'] = $resultat['id'];
$_SESSION['login'] = $resultat['login'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fiche client</title>
    <meta charset ="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="fiche_client.php">Générer une fiche client</a>
            <li class="nav-item">
                <a class="nav-link" href="affecter_intervention.php">Affecter une intervention</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consulter_intervention.php">Consulter les interventions</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="contrat.php">Contrats de garantie</a>
          </li>
        </ul>
    </nav>
    <br><br>

<div class="recherche_p_bis">

<form action="/search" id="searchthis" method="POST" action="fiche_client.php">
<input id="search" name="q" type="text" placeholder="Entrez le numéro du client" />
<input id="search-btn" type="submit" value="Rechercher" />
</form>
</div>
<form class="w3-container" method="POST" action="fiche_client.php">
    <label class="w3-text"><b>Numéro du client</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Raison sociale</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Siren</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Code Ape</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Adresse</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Téléphone</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Fax</b></label>
    <input class="w3-input w3-border" type="text">
    <label class="w3-text"><b>Email</b></label>
    <input class="w3-input w3-border" type="text">
    <br>
    <button class="w3-btn w3-blue">Modifier</button>
</form>     
</body>
</html>
