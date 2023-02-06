<?php
include './../database.php';
$db_conn = new DBController();
$state1 = $_POST['stateT'];

$pullInfo = $db_conn->conn->prepare('SELECT * FROM member_register WHERE state = :state');
$pullInfo->bindParam(':state',$state1);
$pullInfo->execute();
$count = $pullInfo->rowCount();
$data["moneymade"] = $count*1000;
echo json_encode($data); 
?>