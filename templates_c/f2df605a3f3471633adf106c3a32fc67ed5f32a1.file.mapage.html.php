<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-08 12:33:40
         compiled from "mapage.html" */ ?>
<?php /*%%SmartyHeaderCode:148765489c4f7a39383-72079401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2df605a3f3471633adf106c3a32fc67ed5f32a1' => 
    array (
      0 => 'mapage.html',
      1 => 1420720416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148765489c4f7a39383-72079401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489c4f7b70e73_23253781',
  'variables' => 
  array (
    'liste_matiere' => 0,
    'matiere' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489c4f7b70e73_23253781')) {function content_5489c4f7b70e73_23253781($_smarty_tpl) {?><html>
	<head>
		
	</head>
<body>
	<?php  $_smarty_tpl->tpl_vars['matiere'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['matiere']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['liste_matiere']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['matiere']->key => $_smarty_tpl->tpl_vars['matiere']->value) {
$_smarty_tpl->tpl_vars['matiere']->_loop = true;
?>
	    <?php echo $_smarty_tpl->tpl_vars['matiere']->value;?>
 est une matière <br />
		
	<?php } ?>
</body>
</html>

<?php }} ?>
