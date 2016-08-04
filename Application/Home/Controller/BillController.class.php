<?php

namespace Home\Controller;

use Think\Controller;

class BillController extends PublicController
{

	public function billList()
	{
		$time = I('request.time');
		$shop = I('request.shop');
		$filter = array();
		$this->assign('shop',D('shop')->info());
		if(!empty($time) || !empty($shop)){
			if($time){
				$filter[] = array('created_at','>=',strtotime($time));
				$filter[] = array('created_at','<=',strtotime($time)+3600*24);
			}
			if($shop){
				$filter[] = array('shop_id','=',$shop);
			}
			$res = D('Bill','Logic')->billList($filter);
			$this->assign($res);
		}
		$this->display('list');
	}
}