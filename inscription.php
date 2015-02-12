<?php
include("includes/haut.inc.php");
include("includes/connexion.inc.php");


?>


<div id="Formulaire">
		<form action="inscription.php" method="post" id="form_connexion">

			<div class="clearfix">
					<label for="mdp">Email :</label>
					<div class="input"><input id="email" name="email" size="30" type="email"/></div>
			</div>

			<div class="clearfix">
				<label for="mdp">Mdp :</label>
				<div class="input"><input id="mdp" name="mdp" size="30" type="password"/></div>
			</div>

			<div class="clearfix">
				<label for="mdp">Nom :</label>
				<div class="input"><input id="Nom" name="Nom" size="30" type="text"/></div>
			</div>

			<div class="clearfix">
				<label for="mdp">Prenom :</label>
				<div class="input"><input id="Prenom" name="Prenom" size="30" type="text"/></div>
			</div>

	<div class="form-actions">
		<input class="btn btn-large btn-primary" id="submit" type="submit" value="S'inscrire" name="submit" />
	</div>
</div>

<?php

function Formulaire()
{	
	$long =0;
	if(!empty($_POST))
	{				
	
			if(empty($_POST['mdp']))
			{
				$_SESSION['inscription'] = 'EmptyPassword';
			}
			else
				$long = strlen($_POST['mdp']); // Je stocke la longeur du champs du mdp
			if($long<6)
				$_SESSION['inscription'] ='TropPetit';
			else
			{
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // On utilise un filtre pour valider les emails
					$_SESSION['inscription'] = 'invalidMail';
				else
				{
					$pwd = $_POST['mdp'];
					$email = htmlentities($_POST['email']);	
					$nom = htmlentities($_POST['Nom']);		
					$prenom = htmlentities($_POST['Prenom']);						
					$sql = "INSERT into utilisateurs(email,mdp,Nom,Prenom)
							values ('$email','$pwd','$nom','$prenom')";
					$requete = mysql_query($sql) or die (mysql_error());
					$_SESSION['inscription'] = 'inscris';	
					header('location: index.php'); // Retour à l'index si inscription OK !
				}
			}
	
		

	}

}


Formulaire(); // Appelle d'une fonction


include("includes/bas.inc.php");