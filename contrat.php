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
    <title>Contrats de garantie</title>
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
                <a class="nav-link" href="consulter_intervention.php">Consulter les interventions</a>
            </li>
             <li class="nav-item">
                <a class="nav-link active" href="contrat.php">Contrats de garantie</a>
            </li>
        </ul>
    </nav>

</body>
</html>