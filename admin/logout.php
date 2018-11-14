<?php
include_once '../lib/checklogin.php';
$message = '退出成功';
$type = 'success';
$url = 'login.php';

//清除cookies
//session_destroy();  //方法1
$_SESSION=[];         //方法2

include_once '../template/admin/tips.html';