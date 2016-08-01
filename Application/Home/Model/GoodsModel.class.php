<?php
namespace Home\Model;

use Think\Model;

class GoodsModel extends Model
{
	/*
	 * 数据校验规则
	 */
	protected $_validate = array(
		array('name','require','商品名称不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('number','require','商品编号不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('name','','商品已存在',self::MUST_VALIDATE,'unique',self::MODEL_INSERT),
		array('number','','商品编号已存在',self::MUST_VALIDATE,'unique',self::MODEL_INSERT)
	);

	/*
	 * 自动填充
	 */
	protected $_auto = array(
		array('created_at','time',self::MODEL_INSERT,'function'),
		array('updated_at','time',self::MODEL_UPDATE,'function')
	);

	/*
	 * 数据更新
	 */
	public function update($data = null)
	{
		$data = $this->create($data);

		if(empty($data)){
			return false;
		}

		if(!$data['id']){
			$id = $this->add();
			if(!$id){
				$this->error = '添加商品失败';
				return false;
			}
			$data['id'] = $id;
		}else{
			$status = $this->save();
			if($status === false){
				$this->error = '更新商品信息失败';
				return false;
			}
		}

		return $data;
	}

	/*
	 * 判断商品是否存在
	 */
	public function isExist($name)
	{
		if(empty($anme)){
			return false;
		}
		$goods = $this->where("name = '".$name."'")->find();
		if($goods){
			return true;
		}
		return false;
	}
	/*
	 * 商品列表
	 */
	public function goods($filter,$page)
	{
		$count = $this->where($filter)->count();

		$p_size = 5;
		$p_count = $count > 0 ? ceil($count/$p_size) : 0;
		$goods = array();

		if($count > 0) {
			$goods = $this->where($filter)
				->limit(($page - 1) * $p_size, $p_size)
				->select();
		}
		return array(
			'goods' => $goods,
			'p_count' => $p_count,
			'count' => $count
		);
	}

	public function info($data)
	{
		if(empty($data)){
			return false;
		}
		$where = ' 1=1 ';
		foreach($data as $key => $val){
			if(!in_array($val[0],$this->fields)){
				continue;
			}
			if($val[1] == 'in'){
				$where .= 'AND '.$val[0].' '.$val[1]." (".$val[2].") ";
			}else{
				$where .= 'AND '.$val[0].' '.$val[1]." ".$val[2];
			}
		}
		$info = $this->where($where)->select();
		return $info;
	} 
}