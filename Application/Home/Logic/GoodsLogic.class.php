<?php
namespace Home\Logic;

use Think\Model;

class GoodsLogic extends BaseLogic
{
	/* 
	 * 添加新品
	 */
	public function add($data)
	{
		$this->_validate = array(
			array('name','require','请输入商品名'),
			array('number','require','请输入商品编号'),
			array('style','require','请输入款式名'),
			array('stock','integer','数量必须是整数'),
			array('cost','is_numeric','成本金额必须是数字','','function'),
			array('warn_num','integer','报警数量必须是整数')

		);
		
		if(!$this->validate($data)){
			return $this->error();
		}

		$inventory = $data['inventory'];

		$goods = D('goods');
		$data = $goods->update($data);
		if(!$data){
			return $this->error($goods->error);
		}

		$inv = D('inventory');
		foreach($inventory as $val){
			$val['goods_id'] = $data['id'];

			$res = $inv->update($val);
			if(!$res){
				return $this->error($inv->error);
			}
		}
		return $this->success('商品添加成功');
	}
	/*
	 * 商品列表
	 */
	public function goodsList($filter,$page)
	{
		$result = array();

		$goods_res = D('goods')->goods($filter,$page);
		$goods = $goods_res['goods'];
		$ids = array();
		if($goods) {
			foreach ($goods as $key => $val) {
				$ids[] = $val['id'];
				$result[$val['id']] = $val;
				unset($goods[$key]);
			}
			$data = array(
				array('goods_id', 'in', join(',', $ids))
			);
			$inventory = D('inventory')->info($data);
			foreach ($inventory as $val) {
				$result[$val['goods_id']]['stock'] += $val['stock'];
				$result[$val['goods_id'	]]['cost'] += $val['stock'] * $val['cost'];
			}
		}
		return array(
			'goods' => $result,
			'p_count' => $goods_res['p_count'],
			'count' => $goods_res['count'],
			'filter' => $filter
		);
	}

}