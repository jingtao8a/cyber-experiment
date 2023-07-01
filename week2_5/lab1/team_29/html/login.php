
<form action="login.php" method="post">

    输一下密码，就有flag了：<input name="password" type="text">
    <input type="submit">
</form>

<?php

include "db.php";
include "flag.php";



if(isset($_POST["password"])){
    $password = $_POST["password"];
    $result = select("select password from admin where password='$password';");

    if(isset($result[0])) {
        if($result[0]['password'] === $password) {
            echo(json_encode(array('res' => 1, 'msg' => $flag)));
            exit(0);
        }
    }
    
    echo(json_encode(array('res' => 0)));
}

