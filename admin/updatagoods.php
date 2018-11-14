
<?php
header('Content-type:text/html;charset=utf-8');
include_once '../lib/checklogin.php';
include_once '../lib/db.php';
include_once '../lib/function.php';


if($_SERVER['REQUEST_METHOD']== 'GET'){
    $cid = $_GET['cid'];
    $gid = $_GET['gid'];
//    var_dump($gid);
//    var_dump($cid);
//    exit();
    $result = $mysql->query("select * from goods where gid = $gid")->fetch_assoc();
//    var_dump($result);
//    exit();
    $obj = new Menu();
    $str = $obj->getCate($mysql,'cloths',0,0,null,$cid);

    include_once '../template/admin/updatagoods.html';
    exit();
}else if($_SERVER['REQUEST_METHOD']== 'POST'){
    $cid = $_POST['cid'];
    $gid = $_POST['gid'];
    $arr = $_POST;
    var_dump($arr);
    exit();
    //删除数组最后一项cid
//    array_pop($arr);

    $sql = "update goods set ";
    //遍历数组拼接SQL语句
    forEach($arr as $key=>$value){
        $sql.=" $key='$value',";
    }
    $sql = substr($sql,0,-1);
    $sql.="where gid =$gid";
//    var_dump($sql);
//    exit();
    $mysql->query($sql);

    if($mysql->affected_rows == 1){
        $type = 'success';
        $url = 'querygoods.php';
        $message = '修改成功';
    }else{
        $type = 'danger';
        $url = 'updatagoods.php';
        $message = '修改失败';
    }
    require '../template/admin/tips.html';

}

