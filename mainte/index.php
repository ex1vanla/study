<?php
require 'db_connect.php';

// khong nhap user query
// $sql = 'select * from contacts where id = 1';
// $stmt = $pdo -> query($sql);

// $result =  $stmt->fetchall();

// var_dump($result);

//nhap user query    prepare, blind, execute
$sql = 'select * from contacts where id = :id'; //place holder
$result =  $stmt->fetchall();
var_dump($result);


//transaction
$pdo->beginTransaction();
try {
    $stmt = $pdo -> prepare($sql);
    $stmt->bindValue('id', 1, PDO::PARAM_INT);
    $stmt->execute();  //run
    $pdf->commit();
} 
catch (PDOException $e){
    $pdo->rollback();

}

?>