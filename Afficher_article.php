<?php
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	include('includes/verif_connexion.php');
	include('includes/notification.inc.php');

		if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$sql = "SELECT * FROM articles WHERE id=$id";
		$req = mysql_query($sql);
		
		while($data = mysql_fetch_array($req)) {
			echo "<H3>" . $data['Titre'] . "</H3>";
			echo "<p>" . nl2br($data['Texte']) . "</p><BR>";
		}
	}
	
	include('includes/bas.inc.php');		//Inclusion du bas de la page