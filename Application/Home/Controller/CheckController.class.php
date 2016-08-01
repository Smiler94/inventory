<?php

namespace Home\Controller;

use Think\Controller;

class CheckController extends PublicController
{
	public function diffAmount()
	{
		$res = D('check','Logic')->diffAmount();
		
		$this->assign($res);
		$this->display('diff_amount');
	}
}