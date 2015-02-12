<?php 
include('includes/haut.inc.php');
include('includes/connexion.inc.php');
if(isset($_GET['id']))
	$id = $_GET['id'];
if(isset($_POST['Ajouter']))
{
	$id = $_POST['id'];
	$auteur = mysql_real_escape_string($_POST['auteur']);
	$commentaire = mysql_real_escape_string($_POST['texte']);
	$sql = "INSERT into Commentaire values ('','$id','$auteur','$commentaire')";
	$query = mysql_query($sql) or die(mysql_error());
	if($query > 0)
	{
		
		header('location:index.php');
		$_SESSION['commentaire'] = "ajouter";
	}	
	else
	{
		$_SESSION['commentaire'] = "echec";
		header('location:index.php');
	} 
}
else
{
	$_SESSION['commentaire'] = "error";
	header('location : index.php');
} 
?>


<form action="commentaire.php" method="post">
			<div class="clearfix">
				<label for="Auteur">Auteur</label>
				<div class="input"><input type="text" name="auteur" id="auteur"></div>
			</div>
				<div class="clearfix">
				<label for="texte">Texte</label>
				<div class="input"><textarea name="texte" id="texte"></textarea></div>
			</div>	

			<div class="form-actions">
				<input type="submit" value="Ajouter" name="Ajouter" class="btn btn-large btn-primary">
			</div>
			<input type="hidden" name="id" value="<?php echo $id;?>">	


<?php

include('includes/bas.inc.php');