<?php
namespace Home\Controller;

use Think\Controller;

class GoodsController extends PublicController
{
	/*
	 * 添加新品
	 */
	public function add()
	{
		if(IS_POST){
			foreach($_POST['style'] as $key => $val){
				$_POST['inventory'][] = array(
					'style' => $_POST['style'][$key],
					'stock' => $_POST['stock'][$key],
					'cost' => $_POST['cost'][$key],
					'warn_num' => $_POST['warn_num'][$key],
				); 
			}
			unset($_POST['style']);
			unset($_POST['stock']);
			unset($_POST['cost']);
			unset($_POST['warn_num']);

			$res = D('Goods','Logic')->add($_POST);
			$url = '/index.php/Home/Goods/add';
			$this->response($res,$url);
		}else{
			$this->assign('title','添加新品');
			$this->display('add');
		}
	}
	/*
	 * 上传图片
	 */
	public function thumbUpload()
	{
		$type = array('jpg','jpeg','png','gif');
		$file_name = date('Ymd').'/'.time();
		$file = 'file';
		$res = file_upload($file,$type,$file_name);
		if($res){
			make_json_result($res['path']);
		}else{
			make_json_error('图片上传失败，请重新上传');
		}
	}
	/**
	 * 	剩余库存列表
	 */
	public function goodsList()
	{
		$filter = array();
		$field = array('name','number');
		foreach($field as $f){
			if(I('post.'.$f,'','trim')){
				$filter[$f] = I('post.'.$f,'','trim');
			}
		}
		$page = I('get.page',1,'intval');
		$goods = D('goods','Logic')->goodsList($filter,$page);
		$goods['page'] = $page;
		$this->assign($goods);
		$this->display('list');
	}
}