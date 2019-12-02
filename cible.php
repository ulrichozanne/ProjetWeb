<?php

$bdd = new PDO('mysql:host=localhost;dbname=cashcash;charset=utf8', 'root', '');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 


echo $_POST['login'];?></br>

<?php echo $_POST['mdp'];
//  Récupération de l'utilisateur et de son pass hashé
$login = $_POST['login'];
$req = $bdd->prepare('SELECT id, mdp FROM users WHERE login = :login');
$req->execute(array('login' => $login));
$resultat = $req->fetch();

// Vérification mdp



$isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

	if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $login;
        echo "Vous êtes connecté !";
    }
	else {
        echo "Mauvaisrrr identifiant ou mot de passe !";
    }

?>

</body>
</html>