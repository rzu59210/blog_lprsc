<?php
	include('includes/connexion.inc.php');
	//include('includes/notification.inc.php');
	include('includes/verif_connexion.php');
	if(isset($_POST['titre'])){

		// Ajout a la base de donnée :
		//recupère le titre et le sécurise
		$titre = $_POST['titre'];
		$titre = mysql_real_escape_string($titre);
		//recupere le texte et le sécurise
		$texte = $_POST['texte'];
		$texte = mysql_real_escape_string($texte); // Protection contre les injonctions
		$today = date("j. n. Y");  // Date du jours
		$user_id = $_SESSION['utilisateurs']; // Je récupère l'id de l'utilisateurs connecté
		// Si je suis dans le cas ou je suis en modification
		if(isset($_POST['id'])&&$_POST['id']){	
			$id= $_POST['id'];		
			$sql = "UPDATE articles SET Titre='$titre', Texte='$texte' WHERE Id='$id'";	
			$_SESSION['article'] = 'modifier';	
		}else{ // Sinon je suis dans l'ajout
			$sql = "INSERT INTO articles VALUES ('','$texte','$today','$titre','$user_id')";
			$_SESSION['article']= 'ajouter';
		}
		mysql_query($sql) or die (mysql_error());
		if($sql > 1)
			$_SESSION['article'] = 'erreur';
		//redirection
		header('location: index.php');
	}else{
		//Inclusion du haut de la page
		include('includes/haut.inc.php');
		if(isset($_GET['id'])){
			$id= (int)$_GET['id'];			
			$sql = "SELECT * FROM articles WHERE Id = $id";
			$result = mysql_query($sql);
			$data =mysql_fetch_array($result);
			$titre = $data['Titre'];
			$texte = $data['Texte'];
			$nom_btn='Modifier';			
		}else{
			$titre='';
			$texte='';
			$id='';
			$nom_btn='Valider';
		}
		//Affichage du formulaire
		if($connect)
		{
				
		
		?>

		<form action="article.php" method="post">
			<div class="clearfix">
				<label for="titre">Titre</label>
				<div class="input"><input type="text" name="titre" id="titre" value="<?php echo $titre;?>"></div>
			</div>
			
			<div class="clearfix">
				<label for="texte">Texte</label>
				<div class="input"><textarea name="texte" id="texte"><?php echo $texte;?></textarea></div>
			</div>		
			
			<div class="form-actions">
				<input type="submit" value="<?php echo $nom_btn;?>" class="btn btn-large btn-primary">
			</div>
			<input type="hidden" name="id" value="<?php echo $id;?>">
		</form>
		<?php
		}
		else
		{

			echo "Vous n'etes pas connecte, vous allez etre redirige dans 2 secondes...";
			?>

				
			<?php
				echo "<script type='text/javascript'>
				setInterval(function() {
					self.location='index.php';
				}, 2000);
				</script>";
			header('location : index.php');
		}
		//Inclusion du bas de la page
		include('includes/bas.inc.php');	
	}

?>