<?php
include ('includes/haut.inc.php');
include('includes/connexion.inc.php');
include('includes/verif_connexion.php');


if(isset($_GET['id']))
	$id = $_GET['id'];
$sql = "SELECT * from commentaire Where Article_id = $id";
$query = mysql_query($sql) or die(mysql_error());
while($data= mysql_fetch_array($query))
{
	?>
	<h2> <?php echo $data['Auteur']."<br>";?></h2>
	 <?php echo $data['Texte']."<br><br>";?><?php
	 if($connect)
	 		 echo "<a href = 'sup_commentaire.php?id=" . $data['Article_id']. "' class= 'btn btn-danger' id='SupPlace'> Supprimer</a> ";
} 

include ('includes/bas.inc.php');
?>	