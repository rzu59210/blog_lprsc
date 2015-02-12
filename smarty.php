<?php
include('includes/haut.inc.php');

/*Affichage des articles sous Smarty */
$bdd = new PDO('mysql:host=localhost;dbname=blog_wk', 'root', 'lprsc');
$con = false;
if($bdd)
	$con == true;
/* La pagination */
if(isset($_GET['p']))
	$page = $_GET['p'];
else
	$page = 1;
$app = 3;
$debut =($app*$page) - $app;// Je choisis le nbr d'affichage d'articles par page.


echo "allo quoi";

if(isset($_POST['r']))
{
	$Recherche = $_POST['r'];
	$query=$bdd->prepare("SELECT * from articles Where Texte Like '%$Recherche%' OR Titre Like '%$Recherche%'");
}
else
{
	echo "je sis ici";
	$query=$bdd->prepare("SELECT * FROM articles ORDER BY  `articles`.`Date` Desc LIMIT $debut,$app");
	$query1=$bdd->prepare("SELECT count(*) as nb_article FROM articles");
	var_dump($query);
}
 
$query->execute();
$query1->execute();
while ($data = $query->fetch()) {
	echo "dans le while";
	$afficher_articles[] = $data;

}

while($data = $query1->fetch()){
	$total = $data['nb_article'];
	$PagePrecedente = $page - 1;
	$PageSuivante = $page +1;
	$nb_pages = ceil($total/$app);
}

/*---------------------------------------*/

/* Récupérer le p pour la pagination */
/*----------------------*/

require_once('usr/share/php/smarty3/Smarty.class.php');

$index = new Smarty();

$index->assign('connect',$con);
$index->assign('afficher_articles',$afficher_articles);
$index->assign('Recherche',$afficher_articles);
$index->assign('NbPage',$nb_pages);
$index->assign('PageActuelle',$page);

$index->display("indexSmarty.php");

include('includes/bas.inc.php');