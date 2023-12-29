<?php
/* Smarty version 4.3.4, created on 2023-12-29 20:29:24
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\DoctorVisitPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_658f1e14f36567_15565268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '703dcd736ec742f86ea358a3162816f91d1a793c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\DoctorVisitPage.tpl',
      1 => 1703877976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658f1e14f36567_15565268 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="visit">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doctorVisit" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Dodaj wizytę</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_visit_date">Dzień: </label>
			<input id="id_visit_date" type="date" name="visit_date" /><br>
			<label for="id_visit_time">Godzina: </label>
			<input id="id_visit_time" type="time" name="visit_time" /><br>
		</div>
		<div class="pure_controls">
			<input type="submit" value="Zapisz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</div>

<div class="content">
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

	<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
		<h4>Miesięczna rata: </h4>
		<p class="res">
		<?php echo ((string)$_smarty_tpl->tpl_vars['result']->value)." zł";?>

		</p>
	<?php }?> 
</div>

</body>
</html><?php }
}
