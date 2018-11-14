<?php
header('Content-type:text/html;charset=utf-8');

include_once '../lib/checklogin.php';
include_once '../lib/db.php';
include_once '../lib/function.php';


if($_SERVER['REQUEST_METHOD']== 'GET'){
    $cid = $_GET['cid'];
    $result = $mysql->query("select * from cloths where cid = $cid")->fetch_assoc();
//    var_dump($result);
//    exit();
    $obj = new Menu();
    $str = $obj->getCate($mysql,'cloths',0,0,$cid);

    include_once '../template/admin/changecategory.html';

}else if($_SERVER['REQUEST_METHOD']== 'POST'){
    $cid = $_POST['cid'];
    $arr = $_POST;
    //删除数组最后一项cid
    array_pop($arr);

    $sql = "update cloths set ";
    //遍历数组拼接SQL语句
    forEach($arr as $key=>$value){
        $sql.="$key='$value',";
    }
    $sql = substr($sql,0,-1);
    $sql.="where cid =$cid";
//    echo $sql;
    $mysql->query($sql);

    if($mysql->affected_rows == 1){
        $type = 'success';
        $url = 'querycategory.php';
        $message = '修改成功';
    }else{
        $type = 'danger';
        $url = 'changecategory.php';
        $message = '修改失败';
    }
    require '../template/admin/tips.html';

}

