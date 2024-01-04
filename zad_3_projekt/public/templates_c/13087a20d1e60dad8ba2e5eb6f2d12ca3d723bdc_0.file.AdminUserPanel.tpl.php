<?php
/* Smarty version 4.3.4, created on 2024-01-04 20:12:02
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\AdminUserPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6597030224a499_20222667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13087a20d1e60dad8ba2e5eb6f2d12ca3d723bdc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\AdminUserPanel.tpl',
      1 => 1704395509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6597030224a499_20222667 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17299098426597030222cf97_14927201', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_17299098426597030222cf97_14927201 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17299098426597030222cf97_14927201',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userManage"><button class="menuButton">Zarządzanie użytkownikami</button></a>
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
visitManage"><button class="menuButton">Zarządzanie wizytami zarezerwowanymi</button></a><br>

	<div class="colHead"><h2>Klienci</h2>
		<div class="column">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_list']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value["role_name"];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == "client") {?>
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							ID: <?php echo $_smarty_tpl->tpl_vars['row']->value["user_id"];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['row']->value["user_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value["user_surname"];?>
<br>
							Login: <?php echo $_smarty_tpl->tpl_vars['row']->value["user_login"];?>
<br>
						</tr>	
					</table>
				</div>
		
				<div class="visit_area2">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"changeRole"),$_smarty_tpl ) );?>
?user_id=<?php echo $_smarty_tpl->tpl_vars['row']->value["user_id"];?>
"><button>Dodaj rolę doctor</button></a>
				</div>
			</div>	
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>

	<div class="colHead"><h2>Doktorzy</h2>
		<div class="column">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_list']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value["role_name"];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == "doctor") {?>
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							ID: <?php echo $_smarty_tpl->tpl_vars['row']->value["user_id"];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['row']->value["user_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value["user_surname"];?>
<br>
							Login: <?php echo $_smarty_tpl->tpl_vars['row']->value["user_login"];?>

						</tr>	
					</table>
				</div>
		
				<div class="visit_area2">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"changeRole"),$_smarty_tpl ) );?>
?user_id=<?php echo $_smarty_tpl->tpl_vars['row']->value["user_id"];?>
"><button>Usuń rolę doctor</button></a>
				</div>
			</div>	
		<?php }?>
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
