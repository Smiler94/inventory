<?php
/**
 * 库存修正
 */
namespace Home\Model;

use Think\Model;

class CheckModel extends Model
{
    protected $_validate = array(
        array('inventory_id','require','库存id不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
        array('num','require','修正数量不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('created_at','time',self::MODEL_INSERT,'function'),
        array('updated_at','time',self::MODEL_UPDATE,'function')
    );

    public function update($data = null)
    {
        $data = $this->create($data);

        if(empty($data)){
            return false;
        }

        if(!$data['id']){
            $id = $this->add();
            if(!$id){
                $this->error = '库存修正失败';
                return false;
            }
        }else{
            $status = $this->save();
            if($status === false){
                $this->error = '更新库存信息失败';
                return false;
            }
        }

        return $data;
    }

    public function info($filter = array(),$field = "*")
    {
        $where = ' 1=1 ';
        if(!empty($filter)){       
            foreach($filter as $key => $val){
                if(!in_array($val[0],$this->fields)){
                    continue;
                }
                if($val[1] == 'in'){
                    $where .= 'AND '.$val[0].' '.$val[1]." (".$val[2].") ";
                }else{
                    $where .= 'AND '.$val[0].' '.$val[1]." ".$val[2];
                }
            }
        }
        $info = $this->where($where)->field($field)->select();
        return $info;
    } 
}
