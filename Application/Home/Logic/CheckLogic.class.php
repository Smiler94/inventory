<?php

namespace Home\Logic;

use Think\Model;

class CheckLogic extends BaseLogic
{
	public function diffAmount()
	{
		$check = D('check')->info();
		$total = 0;
		foreach($check as $key => $val){
			$filter = array(
				array('id','=',$val['inventory_id'])
			);
			$inventory = D('inventory')->info($filter,'*');
			$check[$key]['inventory'] = $inventory[0];
			$filter = array(
				array('id','=',$inventory[0]['goods_id'])
			);
			$goods = D('goods')->info($filter,'*');
			$check[$key]['goods'] = $goods[0];
			$check[$key]['total'] = $inventory[0]['cost'] * $val['num'];
			$check[$key]['created_at'] = date('Y-m-d H:i:s',$val['created_at']);
			$total += $inventory[0]['cost'] * $val['num'];
		}

		return $this->success(array(
			'check' => $check,
			'total' => $total
		));
	}
}