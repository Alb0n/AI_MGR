<?php
/* Smarty version 4.3.4, created on 2024-01-03 19:03:26
  from 'C:\xampp\htdocs\zad_3_projekt\app\views\AdminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6595a16e066171_17885176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fad7ceee19c4d01c43a2323ff8c914a1704cc70' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zad_3_projekt\\app\\views\\AdminPanel.tpl',
      1 => 1704305002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6595a16e066171_17885176 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15732125676595a16e05d268_95382441', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_686859206595a16e05fad9_90128103', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_15732125676595a16e05d268_95382441 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15732125676595a16e05d268_95382441',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_686859206595a16e05fad9_90128103 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_686859206595a16e05fad9_90128103',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userManage"><button class="menuButton">Zarządzanie użytkownikami</button></a>
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
visitManage"><button class="menuButton">Zarządzanie wizytami zarezerwowanymi</button></a><br>

<?php
}
}
/* {/block 'content'} */
}
