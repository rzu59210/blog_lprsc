<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-08 13:24:15
         compiled from "index.php" */ ?>
<?php /*%%SmartyHeaderCode:1677754ae84ffeb5c97-93038513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6946c12c97e7cb07dc20e77b58c11a80ef26cac0' => 
    array (
      0 => 'index.php',
      1 => 1420723455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1677754ae84ffeb5c97-93038513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'afficher_articles' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ae84fff05140_64268193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ae84fff05140_64268193')) {function content_54ae84fff05140_64268193($_smarty_tpl) {?><?php echo '<?php'; ?>

	require_once('libs/Smarty.class.php');
	include('includes/connexion.inc.php');
	include('includes/haut.inc.php');
	include('includes/verif_connexion.php');
	include('includes/notification.inc.php');



		if(isset($_GET['p']))
			$page = $_GET['p'];
		else
			$page = 1;
	$app = 3;
	$debut =($app*$page) - $app;// Je choisis le nbr d'affichage d'articles par page.
	$sql = "SELECT * FROM articles ORDER BY  `articles`.`Date` Desc "; 


	// Champs de la recherche//

	if($connect)
	{
		echo "Bienvenue : " . $mail ."<br>";
	}
	if(isset($_POST['r'])) 
	{
		$Recherche	= $_POST['r'];
		echo "Resultat de la recherche : <br><br>";
		$sql = "SELECT * from articles Where Texte Like '%$Recherche%' OR Titre Like '%$Recherche%'"; // Affichage de la recherche
		$sql1 = "SELECT count(*) as nb from articles Where Texte Like '%Recherche%' OR Titre Like '%Recherche%'"; // Pour la pagination
   		$result = mysql_query($sql) or die (mysql_error());
	}
	else
	{
		//
		echo "Derniers articles :";
		$sql.= "LIMIT $debut,$app";
		$result = mysql_query($sql);
		$sql1 = "SELECT count(*) as nb from articles";
	}
	////////////////////////////////////
	
	while($data =mysql_fetch_array($result)){ // recupère l'ensemble des tables
	<?php echo '?>'; ?>

	<div class="list-group">
			<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['afficher_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
			<h1 class ="list-group-item heading">
					
				<?php echo $_smarty_tpl->tpl_vars['article']->value['Titre'];?>
<br>

			
					<?php echo '<?php'; ?>
 echo $data['Titre']."<br>";<?php echo '?>'; ?>


			</h1>
		
			<h3><?php echo '<?php'; ?>
 echo "Paru le " ;
					echo  $data['Date'];<?php echo '?>'; ?>
</h3>
	

			<p class ="list-group-item-text"><?php echo '<?php'; ?>
 echo str_replace("\n","<BR>",$data['Texte']);<?php echo '?>'; ?>
</p>
			<?php } ?>
	</div>
		<?php echo '<?php'; ?>
 if($connect) 
		{
			echo "<a href = 'article.php?id=" . $data['Id']. "' class= 'btn btn-primary'> Modifier</a>  ";
		 }<?php echo '?>'; ?>

		
		<?php echo '<?php'; ?>
 if($connect)
			echo "<a href = 'sup_article.php?id=" . $data['Id']. "' class= 'btn btn-danger'> Supprimer</a> ";
		
			echo "<a href = 'commentaire.php?id=" . $data['Id']. "' class= 'btn btn-primary	'> Commenter</a> ";		
		
			echo "<a href = 'AfficherCommentaire.php?id=" . $data['Id']. "' class= 'btn btn-primary	'> Afficher commentaire </a><br><br> ";

			echo "<a href='#' class='afficher-article' data-id=".$data['Id']."> Lire la suite </a><br><br>";
			echo "<a href='smarty.php'>Smarty</a>";

	}	

	
		$rs = mysql_query($sql1) or die(mysql_error());
		/* Pagination */
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

   	include('includes/bas.inc.php');

  
<?php echo '?>'; ?>



<?php }} ?>
