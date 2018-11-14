<?php
header('Content-type:text/html;charset=utf-8');
include_once '../lib/checklogin.php';
include_once '../lib/db.php';
include_once '../lib/function.php';
include_once '../lib/upload.php';
if($_SERVER['REQUEST_METHOD']== 'GET'){

    $obj = new Menu();
    $str = $obj->getCate($mysql,'cloths',0,0);


    $sql = "select * from position";
    $result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);


    include_once '../template/admin/insertgoods.html';

}else if($_SERVER['REQUEST_METHOD']== 'POST'){
    //如果上传的图片状态码为大于0，表示失败，
//    var_dump($_FILES['thumb']);
//    exit();
    if(count($_FILES)>0){
        $upload = new Upload();

        //接受到的图片数组
//  'name' => string '' (length=0)  名字
//  'type' => string '' (length=0)   类型
//  'tmp_name' => string '' (length=0)   文件在服务器临时名字
//  'error' => int 4    等于0上传成功，大于0成功
//  'size' => int 0    文件大小
        $file = $_FILES['thumb'];
        $thumb = $upload->upload($file);
        //不等于10 表示上传不成功
        if($thumb ['code']!= 10){
            $type = 'danger';
            $url = 'insertgoods.php';
            $message = $thumb['msg'];
            include_once '../template/admin/tips.html';
            exit();
            //等于10 上传成功
        }else if($thumb ['code']== 10){

            $arr = $_POST;
            $arr['thumb'] = $thumb['msg'];

            $sql = "insert into goods (";
            forEach($arr as $keys=>$value){
                $sql.="$keys,";
            };
            $sql = substr($sql,0,-1).') values (';
            forEach($arr as $value){
                $sql.="'$value',";
            };
            $sql = substr($sql,0,-1).')';
    //    echo $sql;
    //    exit();
            $mysql->query($sql);

            if($mysql->affected_rows == 1){
                $type = 'success';
                $url = 'querygoods.php';
                $message = '添加商品成功';
            }else{
                $type = 'danger';
                $url = 'insertgoods.php';
                $message = '添加商品失败';
            }
            require '../template/admin/tips.html';
        }

    }else{
       $message = '请上传图片';
       $url = 'insertgoods.php';
       $type = 'danger';
        require '../template/admin/tips.html';
    }



}
