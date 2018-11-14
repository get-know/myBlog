<?php

session_start();
if(!isset($_SESSION['islogin'])){
    $message = '请先登录';
    $type='danger';
    $url='login.php';
    include_once '../template/admin/tips.html';
    exit();
}