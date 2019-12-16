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
  <title>Accueil</title>
  <meta charset ="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>




<?php 



$login = $_POST['login'];
$mdp = $_POST['mdp'];


$loginmdp = $bdd->prepare('SELECT id,login,mdp FROM users WHERE login = :login AND mdp = :mdp');


$loginmdp->execute(array(
 'login' => $login,
 'mdp' => $mdp
));

$resultat = $loginmdp->fetch();



if (!$resultat)
{?>
  

<p>Mauvais identifiant ou mot de passe, revenez à <a href="index.php">L'ACCUEIL</a></p>

<?php
}

else

{



session_start();
$_SESSION['id'] = $resultat['id'];
$_SESSION['login'] = $resultat['login'];

?>

<body class="background">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
          <li class="nav-item active">
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
                <a class="nav-link" href="contrat.php">Contrats de garantie</a>
          </li>
        </ul>
    </nav>
  <div class="container">
     <p class="bienvenue">Bienvenue, <?php echo $_SESSION['login']?></p>
     <button class="button_deconnexion">Déconnexion</button>
  </div>
  </body>

<?php
}
?>


</html>
