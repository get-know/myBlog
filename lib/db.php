<?php

$mysql= new mysqli('localhost','root','','cloth',3306);
if ($mysql->connect_errno){
    echo"数据库链接失败，失败原因" . $mysql->connect_error;
    exit();
}
$mysql->query('set names utf8');
