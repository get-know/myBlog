<?php
include_once '../lib/db.php';



$name = $_GET['name'];
$phone = $_GET['phone'];
$content = $_GET['content'];

$sql = "insert into comment (name,phone,content) values ('$name','$phone','$content')";
//echo $sql;
//ecit();
$mysql->query($sql);

if($mysql->affected_rows==1){
    echo 'success';
}else{
    echo 'error';
}

























//
//include_once '../lib/db.php';
//
//
//$arr = $_GET;
//
//$keys = array_keys($_GET);
//$sql = "insert into comment (";
//for($i=0;$i<count($keys);$i++){
//    $sql.=$keys[$i].',';
//}
//$sql = substr($sql,0,-1).') values (';
//foreach($arr as $val){
//    $sql.="'$val'".',';
//}
//$sql = substr($sql,0,-1).')';
//$mysql->query($sql);
//$id=$mysql->insert_id;
//$sql1 = "select * from comment where id=$id";
//$result = $mysql->query($sql1)->fetch_assoc();
//if(count($result)){
//    echo json_encode($result);
//}
