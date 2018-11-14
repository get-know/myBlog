<?php
header('Content-type:text/html,charset=utf-8');
include_once '../lib/checklogin.php';
include_once '../lib/db.php';
include_once '../lib/page.php';

$num = 3;

$pages = new Page($mysql,$num);
//共有多少页
$size = $pages->allpage();

$pagenum = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;

$result = $pages->getdata($pagenum);

include_once '../template/admin/querygoods.html';
// as 后 为冲突后另外起一个名字
//$sql="select goods.*,cloths.title as cname from goods,cloths where goods.cid = cloths.cid;";
////$sql="select * from goods";
//$result=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);


//var_dump($result);
//exit();
