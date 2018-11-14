<?php
//查看栏目
//获取数据->模板
include_once '../lib/checklogin.php';

include_once '../lib/db.php';

    $sql="select * from cloths";
    $result=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//    var_dump($result);
    include_once '../template/admin/category.html';