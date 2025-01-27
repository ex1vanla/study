<?php
const DB_HOST = 'mysql:dbname=udemy_php;host=127.0.0.1;charset=utf8';
const DB_USER = 'vanla';
const DB_PASSWORD = 'Exone123#';


// $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD);

//Exception
try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   //連想配列
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外
    PDO::ATTR_EMULATE_PREPARES => false,//SQLインジェクション
    ]);
    echo 'Connect successfull';
} 
catch(PDOException $e){
    echo 'Connect failed' . $e ->getMessage(). "\n";
}

?>