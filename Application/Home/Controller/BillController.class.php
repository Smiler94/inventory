<?php

namespace Home\Controller;

use Think\Controller;

class BillController extends PublicController
{

	public function billList()
	{
		$time = I('request.time');
		if(!empty($time)){
			$filter = array(
				array('created_at','>=',strtotime($time)),
				array('created_at','<=',strtotime($time)+3600*24)
			);
			$res = D('Bill','Logic')->billList($filter);
			$this->assign($res);
		}
		$this->display('list');
	}
}