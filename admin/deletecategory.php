<?php
include_once '../lib/checklogin.php';
//include_once '../lib/db.php';  //引入错误不影响后面代码的执行
require '../lib/db.php';    //引入错误后面代码就不执行

$cid = $_GET['cid'];
//echo $cid;
//
//exit();
$sql = "select * from cloths where pid=$cid";

$result = $mysql->query($sql)->fetch_assoc();

//var_dump($result);
//exit();
if(count($result)){
    $message = '有子栏目,删除失败';
    $url = 'querycategory.php';
    $type = 'danger';
}else{

    $sql = "delete from cloths where cid = $cid";
    $mysql->query($sql);

    if($mysql->affected_rows == 1){
        $message = '删除成功';
        $url = 'querycategory.php';
        $type = 'success';
    }else{
        $message = '删除失败';
        $url = 'querycategory.php';
        $type = 'danger';

    }

}
include_once '../template/admin/tips.html';








