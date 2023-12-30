<?php
/* Smarty version 4.3.4, created on 2023-12-30 16:26:16
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\PetAddPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65903698368b38_13345760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c661443c50fe9529a5344c46491ca5abd760a47' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\PetAddPage.tpl',
      1 => 1703949638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65903698368b38_13345760 (Smarty_Internal_Template $_smarty_tpl) {
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
petAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Dodawanie zwierzęcia</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_pet_type">Rodzaj zwierzęcia: </label>
			<select id="id_pet_type" name="pet_type">
				<option value=""></option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['type_list']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value["ptype_id"];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value["ptype_name"];?>
</option>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select><br>
			<label for="id_pet_name">Imię: </label>
			<input id="id_pet_name" type="text" name="pet_name" /><br>
			<label for="id_pet_age">Wiek: </label>
			<input id="id_pet_age" type="number" name="pet_age" /><br>
		</div>
		<div class="pure_controls">
			<input type="submit" value="Zapisz" class="pure-button pure-button-primary"/>
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
