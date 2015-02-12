<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-08 12:27:59
         compiled from "smarty.php" */ ?>
<?php /*%%SmartyHeaderCode:1522754ae77cfd87739-89882785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c04540145e3dd26be6ca23a7a2b1ebf226f449b7' => 
    array (
      0 => 'smarty.php',
      1 => 1420720076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1522754ae77cfd87739-89882785',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54ae77cfdaf559_85728882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ae77cfdaf559_85728882')) {function content_54ae77cfdaf559_85728882($_smarty_tpl) {?><?php echo '<?php'; ?>


require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$matiere = array('Mathématiques', 'Français', 'Physique-Chimie');
$smarty->assign('liste_matiere', $matiere);
$smarty -> display("smarty.php");

<?php }} ?>
