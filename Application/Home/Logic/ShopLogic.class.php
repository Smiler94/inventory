<?php

namespace Home\Logic;

use Think\Logic;

class ShopLogic extends BaseLogic
{
	public function shopList()
	{
		return D('shop')->info();
	}

	public function add($shop)
	{
		foreach($shop as $val)
		{
			$data = array(
				'name' => $val
			);
			D('shop')->update($data);
		}
		return true;
	}
}