<?php 

// Using xampp mysql database
// i can now add this file to .gitignore

$db['db_host']= "localhost";
$db['db_user']= "root";
$db['db_pass']= "";
$db['db_name']= "cms";
foreach ($db as $key => $value) {
    define(strtoupper($key) , $value);
}

?>