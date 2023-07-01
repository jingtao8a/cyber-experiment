<?php
/**
 * Created by PhpStorm.
 * User: jinzhao
 * Date: 2019/6/21
 * Time: 10:24 PM
 */

// error_reporting(1);


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'OPTIONS') {
    exit(0);
}

define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_USERNAME", "629ae1daeec50");
define("MYSQL_PASSWORD", "629ae1e411ae0");
define("MYSQL_DATABASE", "news");
