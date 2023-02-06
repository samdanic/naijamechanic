<?php
include './../database/connection.php';
$db = new DBController();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$mobile = $_POST['search'];

$getinfo = $db->conn->prepare('SELECT * FROM mechanic_register WHERE mobile=:mobile');
$getinfo->bindParam(':mobile',$mobile);
if ($getinfo->execute()) {
    while ($row= $getinfo->fetch(PDO::FETCH_OBJ)) {
       $data['success']= true;
       $data['image']= $row->filename;
       $data['fullname']= $row->fullname;
       $data['mobile']= $row->mobile;
       $data['workshop']= $row->workshop;
       $data['gender']= $row->gender;
       $data['state']= $row->state;
       $data['profession']=$row->profession;
       $data['lga']=$row->lga;
       echo json_encode($data);
    }
}else {
    $data['success']= false;
    $data['error']= true;
    $data['message']="No Content Found, ensure the number is correct and the member has registered!";
    echo json_encode($data);
}

}
