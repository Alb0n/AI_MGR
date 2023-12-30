<?php
/* Smarty version 4.3.4, created on 2023-12-30 16:22:39
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\RegisterPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_659035bf669502_72397818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6770fa6d735052ad959165cbd12d35fd52e525e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\RegisterPage.tpl',
      1 => 1703949653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659035bf669502_72397818 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="login">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Rejestracja</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" /><br>
			<label for="id_password">Hasło: </label>
			<input id="id_password" type="password" name="password" />
			<label for="id_password_repeat">Powtórz hasło: </label>
			<input id="id_password_repeat" type="password" name="password_repeat" />
			<label for="id_name">Imię: </label>
			<input id="id_name" type="text" name="user_name" /><br>
			<label for="id_surname">Nazwisko: </label>
			<input id="id_surname" type="text" name="user_surname" />
			<label for="id_email">E-mail: </label>
			<input id="id_email" type="email" name="user_email" />
			<label for="id_address">Adres zamieszkania: </label>
			<input id="id_address" type="text" name="user_address" />
			<label for="id_pesel">PESEL: </label>
			<input id="id_pesel" type="text" name="user_pesel" />

		</div>
		<div class="pure_controls">
			<input type="submit" value="Zarejestruj" class="pure-button pure-button-primary"/>
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
