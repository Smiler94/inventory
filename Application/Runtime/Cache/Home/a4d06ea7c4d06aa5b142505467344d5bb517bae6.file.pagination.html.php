<?php /* Smarty version Smarty-3.1.6, created on 2016-07-24 15:51:32
         compiled from "Application\Home\VIew\Public\pagination.html" */ ?>
<?php /*%%SmartyHeaderCode:264125794738402f654-15967122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d06ea7c4d06aa5b142505467344d5bb517bae6' => 
    array (
      0 => 'Application\\Home\\VIew\\Public\\pagination.html',
      1 => 1468732156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264125794738402f654-15967122',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTION' => 0,
    'page' => 0,
    'p_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_579473842a066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579473842a066')) {function content_579473842a066($_smarty_tpl) {?><ul class="pagination">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=1">«第一页</a></li>
    <?php if ($_smarty_tpl->tpl_vars['page']->value-2>0){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-2;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-2;?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value-1>0){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
</a></li>
    <?php }?>
    <li><a><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['page']->value+1<=$_smarty_tpl->tpl_vars['p_count']->value){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value+2<=$_smarty_tpl->tpl_vars['p_count']->value){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+2;?>
</a></li>
    <?php }?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['p_count']->value;?>
">最后一页»</a></li>
</ul><?php }} ?>