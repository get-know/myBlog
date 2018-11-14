<?php

header('Content-type:text/html;charset=utf-8');
include_once '../lib/checklogin.php';
include_once '../lib/db.php';
include_once '../lib/function.php';



if($_SERVER['REQUEST_METHOD']== 'GET'){

    $sql = "select * from cloths";
    $result = $mysql -> query($sql)->fetch_all(MYSQLI_ASSOC);
//    var_dump($result);
    $obj = new Menu();
    $str = $obj->getCate($mysql,'cloths',0,0);

    include_once '../template/admin/queryinsert.html';


}else if($_SERVER['REQUEST_METHOD']== 'POST'){

//    var_dump($_POST);
//    $sql = "insert into cloths (title,des,pid) values()";
    //获取数组的属性
    $keys = array_keys($_POST);
    $sql = "insert into cloths(";
//    var_dump($keys);
    //遍历属性数组
    for($i=0;$i<count($keys);$i++){
        $sql.=$keys[$i].',';
    }
    //截取最后一个逗号并且拼接后面的括号
    $sql = substr($sql,0,-1).') values(';

//    var_dump($sql);
    //遍历属性值,for只能遍历索引数组，关系数组可以用forEach
    forEach($_POST as $value){
        $sql.="'$value',";
    }
    $sql = substr($sql,0,-1).')';
    var_dump($sql);
    exit();
    $mysql->query($sql);

    if($mysql->affected_rows == 1){
        $message = '插入成功';
        $type = 'success';
        $url = 'querycategory.php';
    }else{
        $message = '插入失败';
        $type = 'danger';
        $url = 'queryinsert.php';
    }
    include_once '../template/admin/tips.html';



















}