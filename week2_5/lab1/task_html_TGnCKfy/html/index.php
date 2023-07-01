<?php
include "db.php";
$id = $_GET['id'];
if(isset($id)){
    if(preg_match('/ |\*|\r|\n/is',$_GET['id'])){
        die("<body style=\"background-color:#000000\"><center><img src='tui.png'><br><p style='color:#ffff'>退！退！退！</p></center>");
    }
    $id = str_ireplace('select','',$id );
    $id = str_ireplace('union','',$id );
    $id = str_ireplace('if','',$id );
    $id = str_ireplace('info','',$id );
    $id = str_ireplace('sleep','',$id );
    $result = select("select title, content from contents where id=$id;");
    var_dump($result);
}else{
    header('Location:index.php?id=1');
}
echo "<h1>登陆就有flag:<a>/login.php</a></h1>";

