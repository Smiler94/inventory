<?php /* Smarty version Smarty-3.1.6, created on 2016-07-25 21:30:11
         compiled from "./Application/Home/View\Inventory\inventory.html" */ ?>
<?php /*%%SmartyHeaderCode:132925792e2abc2d4b2-75388260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '082ba9f557d858fd66203820a645d57e84d6d430' => 
    array (
      0 => './Application/Home/View\\Inventory\\inventory.html',
      1 => 1469453106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132925792e2abc2d4b2-75388260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5792e2abd65cb',
  'variables' => 
  array (
    'goods' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5792e2abd65cb')) {function content_5792e2abd65cb($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\codetool\\wamp64\\www\\inventory\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Application/Home/View/Public/pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
	<div class="container">
		<h4 style="display:block;width:52px;margin:10px auto"><?php echo $_smarty_tpl->tpl_vars['goods']->value['name'];?>
</h4>
		<table class="table table-striped list-table inventory">
			<thead>
				<tr>
					<td width="12.5%">商品款式</td>
					<td width="12.5%">库存数量</td>
					<td width="12.5%">库存警报数量</td>
					<td width="12.5%">库存成本金额(￥)</td>
					<td width="12.5%">出库</td>
					<td width="12.5%">库存修正</td>
                    <td width="15%">入库时间</td>
                    <td width="10%">操作</td>
				</td>
			</thead>
			<tbody id="inventory_table">
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goods']->value['inventory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
				<tr>
					<td>
                        <?php echo $_smarty_tpl->tpl_vars['i']->value['style'];?>

                        <input type="hidden" name="style" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['style'];?>
"/>                        
                    </td>
					<td>
                        <?php echo $_smarty_tpl->tpl_vars['i']->value['stock'];?>

                        <input type="hidden" name="stock" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['stock'];?>
"/>
                    </td>
					<td>
                        <input class="form-control" name="warn_num" type="number" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['warn_num'];?>
"/>
                    </td>
					<td>
                        <?php echo $_smarty_tpl->tpl_vars['i']->value['cost'];?>

                        <input type="hidden" name="cost" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['cost'];?>
"/>
                    </td>
					<td>
                        <input class="form-control" name="out" type="number"/>                
                    </td>
					<td>
                        <input class="form-control" name="check" type="number"/> 
                    </td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['i']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>

                    </td>
                    <td>
                        <span class="glyphicon glyphicon-minus"></span>
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"/>
                    </td>
				</tr>
                <?php } ?>
			</tbody>
		</table>
        <a class="plus" href="javascript:add()">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <datalist id="styles">
        </datalist>
        <button class="btn btn-success" onclick="javascript:save()">保存</button>
	</div>
</body>
<script>
    var field = [
        'style',
        'stock',
        'warn_num',
        'cost',
        'out',
        'check',
        'id'
    ];
    $(document).ready(function(){
        $.ajax ({
            url : '/index.php/Home/inventory/allStyle',
            type : "post",
            dataType : "json",
            data : 'goods_id='+<?php echo $_smarty_tpl->tpl_vars['goods']->value['id'];?>
,
            success : function(result) {
                if(result.error){
                    return '';
                }else{
                    var styles = result.content;
                    $.each(styles,function(i,style){
                        $("<option>"+style+"</option>").appendTo('#styles');
                    })
                }   
            }   
        });
    })
    function add()
    {
        var tr = $("<tr></tr>");
        $.each(field,function(i,f){
            if(f == 'id'){
                return
            }
            var proper = {
                name: f,
                class: 'form-control',
                type: 'number',
            };
            if(f == 'style'){
                proper.type = 'text';
                proper.list = 'styles';
            }else if(f == 'out' || f == 'check'){
                proper.disabled = true;
            }
            tr.append(
                $("<td></td>").append(
                    $("<input />",proper)
                )
            )
        });
        tr.append(
            $("<td></td>").append(
                $("<input />",{
                    name: 'time',
                    type: 'number',
                    class: 'form-control',
                    disabled: 'true'
                })
            ),
            $("<td></td>").append(
                $("<span></span>",{
                    class: 'glyphicon glyphicon-minus',
                    disabled: 'true'
                }),
                $("<input />",{
                    name: 'id',
                    type: 'hidden',
                    value: ''
                })
            )
        );
        tr.appendTo('#inventory_table');
    }
    function save()
    {
        field.push('id');
        for(var i in field){
            eval("var "+ field[i] + '= []' );
            $("input[name='"+field[i]+"']").each(
                function(){
                    eval(field[i]+'.push($(this).val())');
                }
            );
        }

        console.log(id);
        /*var style = [];
        $("input[name='style']").each(
            function(){
                style.push($(this).val());
            }
        )
        console.log(style);*/
    }
</script><?php }} ?>