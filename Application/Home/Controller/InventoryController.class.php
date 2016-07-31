<?php
/**
 * 库存管理
 */
namespace Home\Controller;

use Think\Controller;

class InventoryController extends PublicController
{
	/**
	 * 商品库存信息		
	 * 
	 * @author 林祯  2016-7-23 09:07:40
	 */
	public function inventory()
	{
	    $goods_id = I('request.goods_id');

	    $res = D('Inventory','Logic')->inventory($goods_id);
        if($res['success']){
            $this->assign('goods',$res['content']);
            $this->assign('title','库存详情');
            $this->display('inventory'); 
        }else{
            $url = '/index.php/Home/Goods/goodsList';
            $this->response($res['msg'],$url,100);
        }
        
	}
    /**
     * 获取商品所有款式
     * 
     * @author 林祯 2016-7-24 17:01:44
     */
    public function allStyle()
    {   
        $goods_id = I('request.goods_id');
        
        $res = D('Inventory','Logic')->styles($goods_id);

        if($res['success']){
            make_json_result($res['content']);
        }else{
            make_json_result(array());
        }
    }

    /**
     * 更新库存信息
     * 
     * @author 林祯 2016-07-28 16:02:01
     */
    public function inventoryUpdate()
    {
        $goods_id = I('request.goods_id');
        $inventory = I('request.inventory');

        $res = D('Inventory','Logic')->updateInventory($goods_id,$inventory);
        if($res['success']){
            make_json_result($res['content']);
        }else{
            make_json_result($res['msg']);
        }
    }

    /**
     * 库存监控
     * 
     * @author 林祯 2016-7-31 21:56:47
     */
    public function monitor()
    {
        $res = D('Inventory','Logic')->monitorInventory();

        $this->display('monitor');
    }
}
