<?php
/**
 * 账单逻辑
 */
namespace Home\Logic;

use Think\Model;

class BillLogic extends BaseLogic
{
    public function billList($filter)
    {
    	$bill = D('bill')->info($filter);
		$total = 0;
		foreach($bill as $key => $val){
			$filter = array(
				array('id','=',$val['inventory_id'])
			);
			$inventory = D('inventory')->info($filter,'*');
			$bill[$key]['inventory'] = $inventory[0];
			$filter = array(
				array('id','=',$inventory[0]['goods_id'])
			);
			$goods = D('goods')->info($filter,'*');
			$bill[$key]['goods'] = $goods[0];
			$bill[$key]['total'] = $inventory[0]['cost'] * $val['num'];
			$bill[$key]['created_at'] = date('Y-m-d H:i:s',$val['created_at']);
			$total += $inventory[0]['cost'] * $val['num'];
		}

		return $this->success(array(
			'bills' => $bill,
			'total' => $total
		));
    }
}
