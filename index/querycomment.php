<?php
include_once '../lib/db.php';

$page = $_GET['pagenum'];
$offset = ($page-1)*3;
$sql= "select * from comment order by id DESC limit $offset,3";
$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

echo json_encode($result);  //输出json格式对象