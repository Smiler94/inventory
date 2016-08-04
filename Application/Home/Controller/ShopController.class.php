<?php

namespace Home\Controller;

use Think\Controller;

class ShopController extends PublicController
{
	public function shopList()
	{
		$res = D('shop','logic')->shopList();
		$this->assign('shop',$res);
		$this->display('list');
	}

	public function add()
	{
		$shop = I('request.shop');
		$res = D('shop','logic')->add($shop);

		make_json_result(1);
	}

}