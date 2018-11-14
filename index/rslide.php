<?php
include_once '../lib/db.php';

$sql = "select * from goods order by gid asc limit 3";
$word = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

include_once '../template/index/rslide.html';