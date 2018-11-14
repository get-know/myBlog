<?php

include_once '../lib/db.php';
include_once 'header.php';
$sql = "select * from goods where pid=1";
$banner = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

$sql = "select * from goods";
$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//var_dump($result);
//exit();

include_once '../template/index/index.html';
include_once 'footer.php';
