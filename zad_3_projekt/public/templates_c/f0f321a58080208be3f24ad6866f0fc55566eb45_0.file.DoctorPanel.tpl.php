<?php
/* Smarty version 4.3.4, created on 2023-12-29 22:24:50
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\DoctorPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_658f3922f31fd1_59310622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0f321a58080208be3f24ad6866f0fc55566eb45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\DoctorPanel.tpl',
      1 => 1703885089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658f3922f31fd1_59310622 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1481489960658f3922f1b502_12593186', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1749494155658f3922f1c086_01767184', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_1481489960658f3922f1b502_12593186 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1481489960658f3922f1b502_12593186',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1749494155658f3922f1c086_01767184 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1749494155658f3922f1c086_01767184',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doctorVisit"><button class="menuButton">Utwórz nową propozycję wizyty</button></a><br>

	<div class="colHead"><h2>Wizyty zaproponowane</h2>
		<div class="column">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'wiersz');
$_smarty_tpl->tpl_vars['wiersz']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz']->value) {
$_smarty_tpl->tpl_vars['wiersz']->do_else = false;
?>
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Lekarz: <?php echo $_smarty_tpl->tpl_vars['wiersz']->value["user_name"];?>

							<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["user_surname"];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_datetime"];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_id"];?>

						</tr>	
					</table>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
	<div class="colHead"><h2>Wizyty zatwierdzone</h2>
		<div class="column">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista2']->value, 'wiersz2');
$_smarty_tpl->tpl_vars['wiersz2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wiersz2']->value) {
$_smarty_tpl->tpl_vars['wiersz2']->do_else = false;
?>
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							<?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["visit_datetime"];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["visit_id"];?>
<br>
							Pacjent:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["pet_name"];?>
<br>
							Rodzaj:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["ptype_name"];?>
<br>
							Wiek:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["pet_age"];?>
<br>
							Właściciel:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["user_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["user_surname"];?>
<br>
							Powód wizyty:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz2']->value["visit_reason"];?>

						</tr>	
					</table>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>

<div class="messages">

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
