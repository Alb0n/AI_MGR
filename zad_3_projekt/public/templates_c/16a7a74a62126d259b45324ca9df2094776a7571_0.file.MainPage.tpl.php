<?php
/* Smarty version 4.3.4, created on 2024-01-04 20:13:58
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\MainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65970376b46e51_32810865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16a7a74a62126d259b45324ca9df2094776a7571' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\MainPage.tpl',
      1 => 1704395633,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65970376b46e51_32810865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185984006965970376b2ed69_84263495', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_185984006965970376b2ed69_84263495 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_185984006965970376b2ed69_84263495',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


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
	<div class="visit_area1">
		<?php if (!\core\RoleUtils::inRole("doctor")) {?>
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"visitForm"),$_smarty_tpl ) );?>
?id=<?php echo $_smarty_tpl->tpl_vars['wiersz']->value["visit_id"];?>
"><button>Wybierz</button></a>
		<?php }?>
	</div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>

<?php
}
}
/* {/block 'content'} */
}
