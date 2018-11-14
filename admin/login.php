<?php

header('Content-type:text/html;charset=utf-8');


//处理登录模块的数据
//1、打开登页面   2.验证数据
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once '../template/admin/login.html';
}else{
//    var_dump($_REQUEST); //输出接收到的数据

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $mysql = new mysqli('localhost','root','','cloth','3306');
    $mysql->query("set names utf8");

    if($mysql->connect_errno){
        echo '连接数据库失败，失败原因'.$mysql->connect_errno;
        exit();
    }

    //1.数据库中没有该用户名
    //2.密码错误
    //3.成功

    $sql = "select * from admin where username = '$username'";
    $result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
//    var_dump($result);
    if(!$result){
        $message = '没有该管理员用户';
        $type = 'danger';
        $url = 'login.php';
        include_once '../template/admin/tips.html';
        exit();
    }

    for($i=0;$i<count($result);$i++){
        if($result[$i]['password']== $password){
            $message = '登录成功';
            $type = 'success';
            $url = 'index.php';

            //开启cookies
            session_start();
            $_SESSION['islogin'] = 'yes';  //保存一个标志
            $_SESSION['username'] = $username;  //保存密码

            include_once '../template/admin/tips.html';
            exit();
        }
    }

    $message = '密码错误';
    $type = 'danger';
    $url = 'login.php';
    include_once '../template/admin/tips.html';
    exit();

}

