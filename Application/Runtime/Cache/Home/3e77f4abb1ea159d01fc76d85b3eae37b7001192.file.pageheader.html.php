<?php /* Smarty version Smarty-3.1.6, created on 2016-07-24 18:21:16
         compiled from "Application\Home\View\Public\pageheader.html" */ ?>
<?php /*%%SmartyHeaderCode:132375792e2abd8cdb1-07635387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e77f4abb1ea159d01fc76d85b3eae37b7001192' => 
    array (
      0 => 'Application\\Home\\View\\Public\\pageheader.html',
      1 => 1469355666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132375792e2abd8cdb1-07635387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5792e2abf3a8b',
  'variables' => 
  array (
    'title' => 0,
    'navbar' => 0,
    'nav' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5792e2abf3a8b')) {function content_5792e2abf3a8b($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
		<link rel="stylesheet" href="/Public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="/Public/css/style.css">
		<link rel="stylesheet" href="/Public/css/goods.css">
		<link rel="stylesheet" href="/Public/css/inventory.css">
		<link rel="stylesheet" href="/Public/css/select2.min.css">
		<link rel="styleshett" href="/Public/css/fcbkcomplete.css">
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/bootstrap.min.js"></script>
		<script src="/Public/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
		<script src="/Public/js/jquery.ajaxfileUpload.js"></script>
		<script src="/Public/js/select2.full.min.js"></script>
		<script src="/Public/js/jquery.fcbkcomplete.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="navbar navbar-default" role="navigation">
				<ul class="nav navbar-nav">
					<?php  $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navbar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->key => $_smarty_tpl->tpl_vars['nav']->value){
$_smarty_tpl->tpl_vars['nav']->_loop = true;
?>
					<li class="top-nav">
						<a href="#">
							<?php echo $_smarty_tpl->tpl_vars['nav']->value['name'];?>

						</a>
						<ul class="child-nav" id="child-nav">
							<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
							<li>
								<a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>		
	</body>
	<script>
		(function(){
			$('.top-nav').mouseover(function(){
				$(this.getElementsByTagName('ul')[0]).show();
			}).mouseout(function(){
				$(this.getElementsByTagName('ul')[0]).hide();
			})
		})();
	</script><?php }} ?>