<?php
include_once('medoo.php');

$database = new medoo([
    // 必须配置项
    'database_type' => 'mysql',
    'database_name' => 'mcserver',
    'server' => '123.206.47.146',
    'username' => 'mcserver',
    'password' => 'dllxFkOGUBsMaJOj',
    'charset' => 'utf8',
 
    // 可选参数
    'port' => 3306,
 
    // 可选，定义表的前缀
    // 'prefix' => 'PREFIX_',
 
    // // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
    // 'option' => [
    //     PDO::ATTR_CASE => PDO::CASE_NATURAL
    // ]
]);
