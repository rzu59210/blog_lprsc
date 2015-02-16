<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-12 15:48:56
         compiled from "indexSmarty.php" */ ?>
<?php /*%%SmartyHeaderCode:26336869854dcbd589f33d8-30314057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42c548462fcd859383e2f498eaef6d9977af4324' => 
    array (
      0 => 'indexSmarty.php',
      1 => 1423752409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26336869854dcbd589f33d8-30314057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'afficher_articles' => 0,
    'recherche' => 0,
    'article' => 0,
    'NbPage' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54dcbd58ab7427_44516291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54dcbd58ab7427_44516291')) {function content_54dcbd58ab7427_44516291($_smarty_tpl) {?>
<?php if (isset($_POST['r'])){?>
	<?php  $_smarty_tpl->tpl_vars['recherche'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recherche']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['afficher_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recherche']->key => $_smarty_tpl->tpl_vars['recherche']->value){
$_smarty_tpl->tpl_vars['recherche']->_loop = true;
?>
	<h1><?php echo $_smarty_tpl->tpl_vars['recherche']->value['Titre'];?>
</h1>
	<h3><?php echo $_smarty_tpl->tpl_vars['recherche']->value['Date'];?>
</h3>
		<?php echo $_smarty_tpl->tpl_vars['recherche']->value['Texte'];?>

	<?php } ?>

	<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['afficher_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
			<h1><?php echo $_smarty_tpl->tpl_vars['article']->value['Titre'];?>
</h1><br>
			<h3>Paru le : <?php echo $_smarty_tpl->tpl_vars['article']->value['Date'];?>
</h3><br>
			<?php echo $_smarty_tpl->tpl_vars['article']->value['Texte'];?>

		<?php } ?>
	

<?php }?>
<br><br>

<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int)ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['NbPage']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['NbPage']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0){
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++){
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
	
	<?php if (isset($_GET['p'])){?>
		<button><a href="smarty.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></button>
	<?php }else{ ?>
		<button><a href="smarty.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></button>
	<?php }?>
<?php }} ?><?php }} ?>