<?php 
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=cashcash;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
if(isset($_POST['connection']))
{
	$login = $_POST['login'];
	$mdp = $_POST['mdp'];
}
/*$reponse = $bdd->query('SELECT * FROM users');
while($donnee=$reponse->fetch())
{
	echo $donnee['id'];
}


$reponse->closeCursor();*/ 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

<!--<form action="inscripBDD.php" method="post">
 Login : <input type="text" name="login" id="login" />
 Mot de passe : <input type="password" name="mdp" id="mdp" />
 <input type="submit" value="OK">
</form>-->
<div align="center">
<h2>Connexion</h2><br />
<form method="POST" action="cible.php">
	Login : <input type="text" name="login" id="login" placeholder="Login">
	Mot de passe : <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
	<input type="submit" name="connexion" value="Se connecter !">

</form>
</div>




</body>
</html>