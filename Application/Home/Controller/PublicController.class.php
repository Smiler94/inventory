<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller
{
	public function assign_init()
	{
		$this->assign('ACTION',__CONTROLLER__.'/'.ACTION_NAME);
		$this->assign('SELF',__SELF__);
	}
	public function _initialize()
	{
		$nav = M()->getAll('SELECT * FROM '.C('DB_PREFIX').'navbar');
		$navbar = array();
		foreach($nav as $key => $val){
			if($val['parent_id'] == 0){
				$navbar[$val['id']] = $val; 
			}else{
				$navbar[$val['parent_id']]['child'][] = $val;
			}
			if($val['url'] == __CONTROLLER__.'/'.ACTION_NAME){
				$this->assign('title',$val['name']);
			}
		}
		$this->assign('navbar',$navbar);
		$this->assign_init();
	}

	/*
	 * 控制器返回
	 */
	public function response($data,$url,$time)
	{
		$url = isset($url) ? $url : '/index.php';
		$time = isset($time) ? $time : 3;
		
		if($data['success']){
			$this->success($data['content'],$url,$time);
		}else{
			$this->error($data['msg'],$url,$time);
		}
	}
}