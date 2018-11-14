<?php
header('Content-Type:text/html;charset=utf-8');
include_once '../lib/db.php';
include_once '../lib/pages.php';
include_once 'header.php';
$cid = $_GET['cid'];
$sql = "select * from cloths where cid = $cid";
$result = $mysql->query($sql)->fetch_assoc();
//侧边推荐文章
$sql = "select * from goods order by gid asc limit 3";
$word = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);


if($result['module']=='list'){
    //每页显示的条数
    $num = 5;
    $pages = new Page($mysql,$num,$cid);
    //共有多少页
    $size = $pages->allpage();

    //当前页码
    $pagenum = !isset($_GET['pagenum']) ? 1 : $_GET['pagenum'];

    //当前页面的数据
    $goods = $pages->getdata($pagenum);
//    var_dump($goods);
//    exit();
//    $sql = "select * from goods where cid=$cid";
//    $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

}else if($result['module'] == 'comment'){

    $sql = "select * from comment order by id desc";
    $res = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//    include_once "comment.php";
}else if($result['module'] == 'aboutus'){
    $sql = "select * from about";
    $about = $mysql->query($sql)->fetch_assoc();


}

//var_dump($result);
//var_dump($result['temp']);
//exit();
include_once "../template/index/{$result['temp']}";
include_once 'footer.php';