<?php
header('Content-Type:text/html;charset=utf-8');
include_once '../lib/db.php';
include_once 'header.php';

$gid = $_GET['gid'];
$cid = $_GET['cid'];

//var_dump($cid);
//var_dump($gid);
//exit();

$sql = "select * from goods where gid = $gid";
$result = $mysql->query($sql)->fetch_assoc();


$sql = "select title from cloths";
$title = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//var_dump($title);
//exit();

//下一篇
$nextsql = "select * from goods where cid=$cid and gid>$gid order by gid asc limit 0,1";

$next = $mysql->query($nextsql)->fetch_assoc();

$nextstr = "";
if($next){
    $nextstr = "<a href='show.php?cid=$cid&&gid={$next['gid']}' class='next'>下一篇：{$next['title']}</a>";
}else {
    $nextstr = "<a href='javascript:void(0);' class='no-next'>没有了</a>";
}

//上一篇
$presql = "select * from goods where cid=$cid and gid<$gid order by gid desc limit 0,1";
//echo $presql;
//exit();
$pre = $mysql->query($presql)->fetch_assoc();
$prestr = "";
if($pre){
    $prestr = "<a href='show.php?cid=$cid&&gid={$pre['gid']}' class='prev'>上一篇：{$pre['title']}</a>";
}else {
    $prestr = "<a href='javascript:void(0);' class='no-prev'>没有了</a>";
}




include_once '../template/index/show.html';
include_once 'footer.php';