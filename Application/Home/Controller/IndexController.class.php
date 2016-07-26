<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PublicController 
{
    public function index()
    {
        $this->display('index');
    }

    public function test()
    {
    	// $data = array(
    	// 	'id' => 7,	
    	// 	'name' => '商品5',
    	// 	'number' => 'aaaaaaaaaaa',
    	// 	'thumb' => 'sdfsdf',
    	// );

    	// dump(D('Goods','Logic')->update($data));
        $data = array(
            array('id','=','7'),
        );
        $info = D('Goods')->info($data);
        dump($info);
    }

}