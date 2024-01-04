<?php
/* Smarty version 4.3.4, created on 2024-01-04 18:26:10
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\LoginPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6596ea32e329e1_34420030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1167c076d4a10d24ca4be3fefe11361fe1027f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\LoginPage.tpl',
      1 => 1704389168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6596ea32e329e1_34420030 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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

<center><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
mainPage"><button class="menuButton">Home</button></a></center>

<div class="login">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Logowanie</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" /><br>
			<label for="id_password">Password: </label>
			<input id="id_password" type="password" name="password" />
		</div>
		<div class="pure_controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</div>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
<h4>Wystąpiły błędy:</h4>
<div class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }?>


</body>
</html><?php }
}
