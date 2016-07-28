<?php
namespace Home\Logic;

use Think\Model;

class BaseLogic extends Model
{
	protected $message = array();
    /*
     * 错误数组
     */
	protected function error($msg)
	{
		$msg = empty($msg) ? $this->error : $msg;
		
		return array('success'=>0,'msg'=>$msg);
	}

	/*
	 * 成功数组
	 */
	protected function success($content)
	{
		return array('success'=>1,'content'=>$content);
	}

	/*
	 * 数据校验
	 */
	protected function validate($data){
		if(!$this->autoValidation($data)){
			return false;
		}

		foreach($data as $key => $val){
			if(!is_array($val)){
				continue;
			}
			return $this->validate($val);
		}
		return true;
	}
}