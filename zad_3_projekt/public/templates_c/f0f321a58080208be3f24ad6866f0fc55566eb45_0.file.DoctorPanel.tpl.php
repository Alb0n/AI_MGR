<?php
/* Smarty version 4.3.4, created on 2024-01-04 20:19:30
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\DoctorPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_659704c2ac0566_18363371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0f321a58080208be3f24ad6866f0fc55566eb45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\DoctorPanel.tpl',
      1 => 1704395749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659704c2ac0566_18363371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_362669362659704c2aa4f35_39078616', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_362669362659704c2aa4f35_39078616 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_362669362659704c2aa4f35_39078616',
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
						</tr>	
					</table>
				</div>
				<div class="visit_area2">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"doctorVisitCancel"),$_smarty_tpl ) );?>
?visit_id=<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_id"];?>
"><button>Usuń wizytę</button></a>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
	<div class="colHead"><h2>Wizyty zarezerwowane</h2>
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

<?php
}
}
/* {/block 'content'} */
}
