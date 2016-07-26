<?php /* Smarty version Smarty-3.1.6, created on 2016-07-24 16:40:10
         compiled from "./Application/Home/View\Public\dispatch_jump.html" */ ?>
<?php /*%%SmartyHeaderCode:1463257947eea0ca163-87446594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79c00a77f03f60d7e9b4773dcf2ba9e4da25c4fd' => 
    array (
      0 => './Application/Home/View\\Public\\dispatch_jump.html',
      1 => 1467475232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1463257947eea0ca163-87446594',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'error' => 0,
    'jumpUrl' => 0,
    'waitSecond' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57947eea3cba9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57947eea3cba9')) {function content_57947eea3cba9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Application/Home/View/Public/pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
.message{ font-size: 20px;width: 70%;height: 300px;margin:auto;border:1px solid #1B8F24;margin-top: 30px;border-radius:4px;}
.head{ width: 100%;height: 30px;background: rgb(222,245,194);text-align: center;padding-top: 5px;border-radius:4px;}
.content{ height: 120px;width: 100%;}
.success ,.error{ text-align: center;margin-top: 30px;}
.jump{ text-align: center;margin-top: 20px;}
</style>
</head>
<body>
    <div class="message">
        <div class="head"><span>提示信息:</span></div>
        <div class="content">
            <?php if ($_smarty_tpl->tpl_vars['message']->value!=null){?>
            <p class="success"><span class="glyphicon glyphicon-ok"</span> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
            <?php }else{ ?>
            <p class="error"><span class="glyphicon glyphicon-remove"</span> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
            <?php }?>
            <p class="detail"></p>
            <p class="jump">
                <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">如果你的浏览器没有自动跳转，请点击这里...</a>
                <br />
                等待时间： <b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>
            </p>
        </div>
    </div>
    <script type="text/javascript">
    (function(){
    var wait = document.getElementById('wait'),href = document.getElementById('href').href;
    var interval = setInterval(function(){
        var time = --wait.innerHTML;
        if(time <= 0) {
            location.href = href;
            clearInterval(interval);
            };
        }, 1000);
    })();
    </script>
</body>
</html><?php }} ?>