<?php

include_once '../lib/db.php';

class Page{
    //每页显示的条数
    public $size; //每页显示条数
    public $mysql;
    public $pages;//共有多少页
    public $cid;
    function __construct($mysql,$size) //当做属性传进来
    {
        $this->size = $size;
        $this->mysql = $mysql;
        $this->pages = 0;

    }
    //获取总页数 total  和每页显示的条数size
    function allpage(){

        $sql = "select count(*) as num from goods where 1 $this->cid";
//
        $result = $this->mysql->query($sql)->fetch_assoc();
//        var_dump($result['num']);
//        exit();
        $total = $result['num'];
        $this->pages=ceil($total / $this->size);

        return $this->pages;

    }
    //获取当前页显示的数据
    function getdata($page){
        $offset = ($page-1)*$this->size; //偏移量
        $len = $this->size;   //显示几条
        $sql = "select goods.*,cloths.title as cname from goods,cloths where goods.cid = cloths.cid order by gid asc limit $offset,$len";
        $result = $this->mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    //获取当前页

}











