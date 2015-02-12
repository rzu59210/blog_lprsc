
{if isset($smarty.post.r)}
	{foreach from=$afficher_articles item=recherche}
	<h1>{$recherche.Titre}</h1>
	<h3>{$recherche.Date}</h3>
		{$recherche.Texte}
	{/foreach}

	{else}
		{foreach from=$afficher_articles item=article}
			<h1>{$article.Titre}</h1><br>
			<h3>Paru le : {$article.Date}</h3><br>
			{$article.Texte}
		{/foreach}
	

{/if}
<br><br>

{for $page=1 to $NbPage}
	
	{if isset($smarty.get.p)}
		<button><a href="smarty.php?p={$page}">{$page}</a></button>
	{else}
		<button><a href="smarty.php?p={$page}">{$page}</a></button>
	{/if}
{/for}