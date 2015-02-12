<?php
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	include('includes/verif_connexion.php');
	include('includes/notification.inc.php');

	?>

<h2> Connexion </h2>

<form action="connexion.php" method="post" id="form_connexion">
<fieldset>	
	<div class="clearfix">
		<label for="email">Email :</label>
		<div class="input"><input id="email" name="email" size="30" type="email" /></div>
	</div>

	<div class="clearfix">
		<label for="mdp">Mdp :</label>
		<div class="input"><input id="mdp" name="mdp" size="15" type="password"/></div>
	</div>

	<div class="form-actions">
		<input class="btn btn-large btn-primary" id="submit" type="submit" value="Se connecter" />
	</div>
	<?php 
	if($connect)
		{
			?>
				<div class="form-actions">
					<input class="btn btn-large btn-primary" id="submit" type="submit" value="Se deconnecter" name="Deco" />
				</div>
	<?php 	
		deconnexion();
	} ?>
</fieldset>
</form>

<?php
if($connect)
{
}
else
{
	TraiterFormulaire();
}
include('includes/bas.inc.php');
?>



<?php 

function deconnexion()
{
	if(isset($_POST["Deco"]))
	{
		setcookie("MonCookie","",time()-1);	
		$connect = false;
		$_SESSION['connexion'] = 'deconnexion';
		header('location: index.php'); 
	}
}

function TraiterFormulaire()
{

	if(isset($_POST['email']))
	{
		$mail = mysql_real_escape_string($_POST['email']);
		$mdp = mysql_real_escape_string($_POST['mdp']);
		$requete = "SELECT email,mdp,id from utilisateurs Where email='$mail' and mdp='$mdp'";
		$rs = mysql_query($requete) or die (mysql_error());
		$result = mysql_num_rows($rs);
		while($data = mysql_fetch_array($rs))
		{
			if($result>0)
			{
				$Sid = md5($mail . time()); // Generation de l'id
				$expiration = time() + (30 * 60);
				$requete = "UPDATE utilisateurs SET Sid='$Sid',expiration='$expiration' WHERE email='$mail'";
				$rs = mysql_query($requete) or die (mysql_error());
				if(setcookie("MonCookie",$Sid,$expiration))
				{
					$_SESSION['utilisateurs'] =$data['id'];
					$_SESSION['connexion'] = 'connect';
					header('location:index.php');
				}
				else
				{
					$_SESSION['connexion'] = 'erreur';
				}
			}
			else
			{
				$_SESSION['connexion'] = 'invalide';
			}
		}

	}
	else
	{
		$_SESSION['connexion'] ='not_correct';
	}
}

?>