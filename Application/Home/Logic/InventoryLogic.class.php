<?php
/**
 * 库存逻辑
 */
namespace Home\Logic;

use Think\Model;

class InventoryLogic extends BaseLogic
{
	/**
	 * 获取商品库存信息
	 */
	public function inventory($goods_id)
	{
		if(empty($goods_id)){
			return $this->error('请填入商品id');
		}
		$data = array(
			array('id','=',$goods_id)
		);
		$goods = D('Goods')->info($data);
		if(empty($goods[0])){
			return $this->error('无该商品信息');
		}

		$data = array(
			array('goods_id','in',$goods_id)
		);
		$inventory = D('Inventory')->info($data);
		if(empty($goods)){
			return $this->error('该商品无款式');
		}
		$goods[0]['inventory'] = $inventory;
		return $this->success($goods[0]);
	}
	/**
	 * 获取商品所有款式
	 * 
	 * @author 林祯 2016-7-24 17:03:25
	 */
	public function styles($goods_id)
	{
	    if(empty($goods_id)){
	    	return $this->error('请填入商品id');
	    }
	    	
	    $data = array(
	    	array('goods_id','in',$goods_id)
	    );

	    $style = D('Inventory')->info($data,'id,style');
	    if($style){
	    	foreach($style as $key => $val){
	    		if(!in_array($val['style'],$style)){
	    			$style[] = $val['style'];
	    		}
	    		unset($style[$key]);	
	    	}
	    	return $this->success($style);
	    }
	    return $this->error('该商品无款式');
	}
	/**
	 * 更新库存信息
	 * 
	 * @author 林祯 2016-07-28 16:03:28
	 */
	public function updateInventory($goods_id,$data)
	{
	    if(empty($goods_id)){
	    	return $this->error('参数不正确');
	    }

	    $this->_validate = array(
	    	array('style','require','款式不能为空',self::MUST_VALIDATE,'regex'),
	    	array('stock','number','库存数量必须为整数',self::MUST_VALIDATE,'regex'),
	    	array('warn_num','number','库存警报必须为整数',self::MUST_VALIDATE,'regex'),
	    	array('cost','is_numeric','库存成本金额必须为数字',self::MUST_VALIDATE,'function'),
	    	array('out','number','出库数量必须为整数',self::VALUE_VALIDATE,'regex'),
	    	array('check','number','库存修正必须为整数',self::VALUE_VALIDATE,'regex'),
	    );
	    foreach($data as $key => $val){
	    	if(!$this->validate($val)){
	    		$this->message[] = '第'.($key+1).'行:'.$this->error;
	    		unset($data[$key]);
	    		continue;
	    	}
	    	$data[$key] = array();
	    	$data[$key]['out'] = $val['out'];
	    	unset($val['out']);
	    	$data[$key]['check'] = $val['check'];
	    	unset($val['check']);
	    	$data[$key]['inventory'] = $val;
	    }
	    if(empty($data)){
	    	return $this->error(join(',',$this->message));
	    }
	    $filter = array(
	    	array('goods_id','=',$goods_id)
	    );

	    $field = array_keys($data[0]['inventory']);
	    $inventory = D('inventory')->info($filter,$field);

	    foreach($data as $val){
	    	if(!in_array($val['inventory'],$inventory)){
	    		D('inventory')->update($val);
	    	}
	    }
	}
}
