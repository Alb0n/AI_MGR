<?php
/* Smarty version 4.3.4, created on 2023-12-28 17:39:27
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_658da4bfb42df8_65557037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84bbb27bef9a1781c841d81a3cac36943c51b056' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\templates\\main.tpl',
      1 => 1703781562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658da4bfb42df8_65557037 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
	<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>

<div class="header">
	<h1><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Klinika weterynaryjna" ?? null : $tmp);?>
</h1>
	<h2><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_header']->value ?? null)===null||$tmp==='' ? "Umów się na wizytę" ?? null : $tmp);?>
</h1>
</div>

<div class="menu">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
mainPage"><button class="menuButton">Home</button></a>
	<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout"><button class="menuButton">Wyloguj</button></a>
	<?php } else { ?>
	 	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow"><button class="menuButton">Zaloguj</button></a>
	<?php }?>
</div>

<div class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_343731402658da4bfb41385_31139242', 'content');
?>

</div><!-- content -->

<div class="footer">
	<p>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_500086469658da4bfb42227_28602259', 'footer');
?>

	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. 
	</p>
</div>


</body>
</html><?php }
/* {block 'content'} */
class Block_343731402658da4bfb41385_31139242 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_343731402658da4bfb41385_31139242',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_500086469658da4bfb42227_28602259 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_500086469658da4bfb42227_28602259',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}