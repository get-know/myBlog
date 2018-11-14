<?php


header('Content-type:text/html;charset=utf-8');
include_once '../lib/db.php';
include_once 'header.php';

$keyword = $_GET['keyword'];

$sql = "select * from goods where title like '%$keyword%'";
$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

include_once '../template/index/search.html';
include_once 'footer.php';