<?php
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	$sql = "SELECT * FROM articles";
	$result = mysql_query($sql);
	while($data =mysql_fetch_array($result)){
	?>
		<h1><?php echo $data['titre']."<br>";?></h1>
		<h3><?php echo "Paru le " ;
		echo $data['date']."<br>"."<br>";?></h3>
		<p><?php echo $data['texte']."<br>"."<br>"."<br>";?></p>
		<?php
	}
	
	//var_dump($data);
	//echo "Hello world !";  
   	include('includes/bas.inc.php');	
?>