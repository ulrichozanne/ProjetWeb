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
    <title>Consulter interventions</title>
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
                <a class="nav-link" href="affecter_intervention.php">Affecter une intervention</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="consulter_intervention.php">Consulter les interventions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contrat.php">Contrats de garantie</a>
            </li>
        </ul>
    </nav>
    <div class="container">
    <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="resume-content">
            <div class="recherche_p_bis">

            <form action="/search" id="searchthis" method="post">
            <input id="search" name="q" type="text" placeholder="Entrez une date ou le nom d'un agent" />
            <input id="search-btn" type="submit" value="Rechercher" />
            </form>
        </div>
            <h1 class="liste_intervention">Liste des interventions</h1>
            <br><br>
                <table class="table table-bordered table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="titre">Numéro d'intervention</th>
                        <th class="titre">Nom</th>
                        <th class="titre">Adresse</th>
                        <th class="titre">Date</th>
                        <th class="titre">Heure</th>
                        <th class="titre">Numéro de série</th>
                        <th class="titre">Type de matériel</th>
                        <th class="titre">Temps passé</th>
                        <th class="titre">Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>