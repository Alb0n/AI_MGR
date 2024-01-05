<?php
/* Smarty version 4.3.4, created on 2024-01-04 20:29:01
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\ClientPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_659706fda4bb37_04377813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df18c230067d756d20c908c72cbf3c3a0b66b4da' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\ClientPanel.tpl',
      1 => 1704395730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659706fda4bb37_04377813 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_248538142659706fda2fbf9_30533340', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_248538142659706fda2fbf9_30533340 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_248538142659706fda2fbf9_30533340',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
petAdd"><button class="menuButton">Dodaj zwierzę</button></a><br>

	<div class="colHead"><h2>Moje wizyty</h2>
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
							Pacjent:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["pet_name"];?>
<br>
							Powód wizyty:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_reason"];?>

						</tr>	
					</table>
				</div>
				<div class="visit_area2">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"clientVisitCancel"),$_smarty_tpl ) );?>
?visit_id=<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_id"];?>
"><button>Odmów wizytę</button></a>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
	<div class="colHead"><h2>Moje zwierzęta</h2>
		<div class="column">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['petList']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Imię:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['row']->value["pet_name"];?>
<br>
							Wiek:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['row']->value["pet_age"];?>
<br>
							Rodzaj:<span class="tab"></span><?php echo $_smarty_tpl->tpl_vars['row']->value["ptype_name"];?>
<br>
						</tr>	
					</table>
				</div>
				<div class="visit_area2">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"clientPetDelete"),$_smarty_tpl ) );?>
?pet_id=<?php echo $_smarty_tpl->tpl_vars['row']->value["pet_id"];?>
"><button>Usuń zwierzę</button></a>
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
