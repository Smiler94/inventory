<?php /* Smarty version Smarty-3.1.6, created on 2016-07-24 15:53:21
         compiled from "./Application/Home/View\Goods\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1609557947383ab6b51-83189603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daa4340d9e4e266644a52efdf265b68ab6f78a53' => 
    array (
      0 => './Application/Home/View\\Goods\\list.html',
      1 => 1469346800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1609557947383ab6b51-83189603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57947383eae55',
  'variables' => 
  array (
    'SELF' => 0,
    'filter' => 0,
    'goods' => 0,
    'g' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57947383eae55')) {function content_57947383eae55($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Application/Home/View/Public/pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
	<div class="container">
		<div class="list-header">
			<form role="form" action="<?php echo $_smarty_tpl->tpl_vars['SELF']->value;?>
" class="form-inline" method="post">
				<div class="form-group">
					<label for="number" class="control-label">商品编号:</label>
					<input type="text" class="form-control" name="number" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['number'];?>
"/>
				</div>
				<div class="form-group">
					<label for="name" class="control-label">商品名称:</label>
					<input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
"/>
				</div>
				<button class="btn btn-default" >搜索</button>
			</form>
		</div>
		<table class="table table-striped list-table" id="goods_list">
			<thead>
				<tr>
					<td>商品编号</td>
					<td>商品名称</td>
					<td>商品图片</td>
					<td>商品总库存</td>
					<td>总成本金额</td>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>
				<tr>
					<td>
						<a href="/index.php/Home/Inventory/inventory/goods_id/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['g']->value['number'];?>
</a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</td>
					<td>
						<img class="img-thumbnail" width="70px" src="/<?php echo $_smarty_tpl->tpl_vars['g']->value['thumb'];?>
" />
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['g']->value['stock'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['g']->value['cost'];?>
</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php echo $_smarty_tpl->getSubTemplate ("Application/Home/VIew/Public/pagination.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</body>
<?php }} ?>