<?php
$croix = "<a href='#' id='croix' class='cacher_notif'>&times</a>";
if(isset($_SESSION['article']))
{

switch ($_SESSION['article']) {
	case 'ajouter':
		echo "<div class='alert alert-success' '> Vous avez bien ajouté un article $croix </div>";
		$_SESSION['article'] = "";
		break;
	case 'modifier':
		echo  "<div class='alert alert-success'> Vous avez bien modifié un article $croix </div>";
		$_SESSION['article'] = "";
		break;
	case 'erreur':
		echo  "<div class='alert alert-error'> Erreur, veuillez réessayer $croix</div>";
		$_SESSION['article'] = "";
		break;
	case 'supprimer':
		echo  "<div class='alert alert-success'> Vous avez bien supprimer un article $croix</div>";
		$_SESSION['article'] = "";
		break;
	default:
		# code...
		break;
}
}

if(isset($_SESSION['connexion']))
{
switch ($_SESSION['connexion']) {
	case 'connect':
		echo "<div class='alert alert-success'> Vous êtes connecté ! ". $croix ."</div>";
		$_SESSION['connexion'] = "";
		break;
	case 'deconnexion':
		echo "<div class='alert alert-success'> Vous vous êtes déconnecté ! $croix</div>";
		$_SESSION['connexion'] = "";
		break;
	case 'invalide':
			echo  "<div class='alert alert-error'> Erreur d'authentification ! $croix</div>";
			$_SESSION['connexion'] = "";
			break;
	case 'erreur':
			echo  "<div class='alert alert-error'> Erreur 404 ! $croix</div>";
			$_SESSION['connexion'] = "";
			break;
	case 'not_correct':
			echo  "<div class='alert alert-error'>Email incorrect ! $croix </div>";
			$_SESSION['connexion'] = "";
			break;
	default:
		# code...
		break;
}
}

if(isset($_SESSION['commentaire']))
{
	switch ($_SESSION['commentaire']) {
		case 'ajouter':
			echo "<div class='alert alert-success'> Commentaire ajouté ! $croix</div>";
				$_SESSION['commentaire'] == "";
			break;
		case 'echec' : 
			echo "<div class='alert alert-error'> Erreur d'ajout ! </div>";
			break;
		
	
		$_SESSION['commentaire'] == "";
	}
}

if(isset($_SESSION['inscription']))
{
	switch ($_SESSION['inscription']) {
		case 'inscris':
					echo "<div class='alert alert-success'> Vous êtes correctement inscris ! ". $croix ."</div>";	
					$_SESSION['inscription'] = "";	
			break;
		case 'EmptyPassword':
					echo  "<div class='alert alert-error'> Erreur, mot de passe vide ! $croix</div>";
			break;
		

		$_SESSION['inscription'] = "";
	}
}

?>