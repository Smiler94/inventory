<?php

function make_json_result($content, $message='', $append=array())
{
    make_json_response($content, 0, $message, $append);
}

function make_json_error($msg)
{
    make_json_response('', 1, $msg);
}

function make_json_response($content='', $error="0", $message='', $append=array())
{
    include_once(COMMON_PATH.'Util/Json.class.php');
    $json = new JSON;
    $res = array('error' => $error, 'message' => $message, 'content' => $content);
    if (!empty($append))
    {
        foreach ($append AS $key => $val)
        {
            $res[$key] = $val;
        }
    }
    $val = $json->encode($res);
    exit(print($val));
}

function file_upload($file,$type,$file_name){
    include_once(COMMON_PATH.'Util/FileUpload.class.php');
    $upload=new FileUpload($file,0,$type);
    //获取上传信息
    $info=$upload->getUploadFileInfo();
    $path=rtrim('Public/upload',DIRECTORY_SEPARATOR).'/'.$file_name.".".$info['suffix'];
    $success=$upload->save($path);
    
    if($success){
        return array('info'=>$info,'path'=>$path);
    }
    return false;
}

function img_crop($src,$path,$x,$y,$w,$h,$width,$height){
    include_once(COMMON_PATH.'Util/ImgCrop.class.php');
    $crop=new ImgCrop();
    $crop->initialize($src,$path,$x,$y,$width,$height,$w,$h);
    $success = $crop->generate_shot();
    if($success){
        return true;
    }
    return false;
}

function read_excel($excel_tmp_name,$field_arr=array()){
    $res_arr = array ();
    if($excel_tmp_name){
        import('Vendor.PHPExcel174.excel_class',LIB_PATH,'.php');
        $add_time = time();
        $data = new \Spreadsheet_Excel_Reader ();
        $data->setOutputEncoding ( 'UTF-8' );
        $data->read($excel_tmp_name);
        if($field_arr){
            for($i = 1; $i <= $data->sheets[0]['numRows']; $i ++) {
                reset($field_arr);
                for($j = 1; $j <= $data->sheets[0]['numCols']; $j ++) {
                    if (! empty ( $data->sheets[0]['cells'][$i][$j])) {
                        if($field_arr){
                            $res_arr[$i][current($field_arr)] = $data->sheets[0]['cells'][$i][$j];
                             next($field_arr);
                        }
                    }
                }
            }
        }else{
            $res_arr = $data->sheets [0] ['cells'];
        }
    }
    return $res_arr;
}

function str_place($string){
    $str_array = array('<'=>'&lt;','>'=>'&gt;','"'=>'&quot;');

    foreach($str_array as $key =>$value){
        $string = str_replace($key,$value,$string);
    }

    return $string;
}

function addslashes_array($array){
    foreach($array as $key => $val){
        if(is_array($val)){
            $array[$key] = addslashes_array($array[$key]);
        }else{
            $array[$key] = addslashes($val);
        }
    }
    return $array;
}