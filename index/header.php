<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/18
 * Time: 17:06
 */
include_once '../lib/db.php';

$sql = "select * from cloths";
$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//var_dump($result);
//exit();
$sql = "select * from about";
$about = $mysql->query($sql)->fetch_assoc();

include_once '../template/index/header.html';