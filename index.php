<?php
		/* les includes  */
	require_once('libs/Smarty.class.php');
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	include('includes/verif_connexion.php');
	include('includes/notification.inc.php');
		/*----------------*/

	if(isset($_GET['p']))
		$page = $_GET['p']; // Je stocke dans $page le contenu de p
	else
		$page = 1;

	$app = 3;
	$debut =($app*$page) - $app;// Je choisis le nbr d'affichage d'articles par page.
	//$sql = "SELECT * FROM articles ORDER BY  `articles`.`Date` Desc "; // Requête sql qui permet de récupérer les articles par date 
	 $sql = "SELECT * FROM articles LEFT JOIN utilisateurs ON articles.user_id = utilisateurs.id ORDER BY  `articles`.`Date` Desc ";

	
	echo "<a href='smarty.php'>Blog sous Smarty</a><br>"; // Lien vers le blog sous Smaty

	if($connect) // Si une personne est connectée
	{
		echo "Bienvenue : " . $mail ."<br>"; // J'affiche l'email de la personne
	}
	if(isset($_POST['r'])) // Je teste si nous ne faisons pas une recherche
	{
		$Recherche	= $_POST['r'];  // Je récupére le contenue du champs recherche
		echo "Resultat de la recherche : <br><br>";
		$sql = "SELECT * from articles Where Texte Like '%$Recherche%' OR Titre Like '%$Recherche%'"; // Affichage de la recherche
		$sql1 = "SELECT count(*) as nb from articles Where Texte Like '%Recherche%' OR Titre Like '%Recherche%'"; // Pour la pagination
   		$result = mysql_query($sql) or die (mysql_error()); // j'execute la 1ère requete contenue dans $sql
	}
	else
	{
		// Alors je fais : 
		echo "Derniers articles :";
		$sql.= "LIMIT $debut,$app"; // J'ajoute a ma toute 1èere requête une limite d'affichage (ici c'est 3 articles)
		$result = mysql_query($sql) or die (mysql_error());
		$sql1 = "SELECT count(*) as nb from articles"; // Je stocke dans nb le nombre d'articles
	}
	
	while($data =mysql_fetch_array($result)){ // recupère l'ensemble des tables
	?>
	<div class="list-group">
			<h1 class ="list-group-item heading">	
					<?php echo $data['Titre']."<br>"; // J'affiche le titre d'un articles?>

			</h1>
		
			<h3><?php echo "Paru le " ;
					echo  $data['Date']; // J'affiche la Date d'un article ?></h3>
	

			<p class ="list-group-item-text">
			<?php  
			str_replace("\n","<BR>",$data['Texte']);
			if(strlen($data['Texte']) <= 200) // Je prend la longueur dû texte et je la teste <= 200
				echo $data['Texte'];
			else
			{
				echo substr($data['Texte'], 0 , 200);
				echo "<a href='#' class='afficher_article' data-id=".$data['Id']."> Lire la suite </a><br><br>";
			}
			;?></p>
			<h4>Auteur : <?php  echo $data['Nom']." ". $data['Prenom'];?></h4>
		
	</div>
		
		<?php if($connect) 
		{
			echo "<a href = 'article.php?id=" . $data['Id']. "' class= 'btn btn-primary' > Modifier</a>  ";	
			echo "<a href = 'sup_article.php?id=" . $data['Id']. "' class= 'btn btn-danger'> Supprimer</a> ";		
			echo "<a href = 'commentaire.php?id=" . $data['Id']. "' class= 'btn btn-primary	'> Commenter</a> ";				

		}
			echo "<a href = 'AfficherCommentaire.php?id=" . $data['Id']. "' class= 'btn btn-primary	'> Afficher commentaire </a><br><br> ";

		}	 // Fin du while

	
		$rs = mysql_query($sql1) or die(mysql_error());
		/* Ici on va faire notre pagination */
		while($data =mysql_fetch_array($rs))
		{			
			$total = $data['nb'];
			$PagePrecedente = $page - 1;
			$nb_pages = ceil($total/$app);
			
			if($page <= 0)
				echo "<button><a href='index.php?p=$page'> Précédent </a></button>";
			else
				echo "<button><a href='index.php?p=$PagePrecedente'> Précédent </a></button>";
			for($i=1;$i<=$nb_pages;$i++)
			{	
				echo "<button><a href='index.php?p=$i'>" .$i. "</a></button>";
			}
			$PageSuivante = $page + 1;
			echo "<button><a href='index.php?p=$PageSuivante'> Suivant </a></button>";
			
		}
		/*-----------------------------------*/

   	include('includes/bas.inc.php');
  
  
?>


<script>
function fermer() 
{
	$(".alert").fadeOut();
} 
$(function(){
	$("#croix").click(function(){
		fermer(); 
	}); 
	setTimeout(function	(){fermer()}, 5000); // Fait disparaitre la notification au bout de 5s

	$(".afficher_article").click(function(){ // Quand on clique sur modifier
			var id = $(this).attr('data-id');  /* On va récupérer l'id de l'article */
			$.get("Afficher_article.php?id="+ id,function(data){   
				$(".container").html(data); // On affiche le tout dans le container
			});
	
});
/* Pour le chargement de la page */
$(document).ready(function(){
	$(".container").hide();
	$("body").append('<div id="wait"><img src="assets/images/ajax-loader.gif"/></div>');
})
$(window).load(function(){
	
	$(".container").delay(500).fadeIn(2000);
	$("#wait").delay(100).fadeOut();
});
});
</script>

