<?php
include ('./../database/connection.php');

$db = new DBController();

// if (isset($_POST['submit'])) {
    $mobile = $_POST['mobile'];
//    $image = $_FILES['pic']['tmp_name'];
//    $cert = $_FILES['cert']['tmp_name']''

//    echo $file;

   if ($_FILES['pic']['size'] &&$_FILES['cert']['size']> 0) {
    // if file submitted is greater than 0 it will run
    if ($_FILES['pic']['size'] && $_FILES['cert']['size']<= 253000000 ) {
        $uniqImg = uniqid();
        $uniqCert = uniqid();
      // if file submitted is less than 2.5mb it will run
      if (move_uploaded_file($_FILES['pic']['tmp_name'], "./../file/images/".$uniqImg)&&
      move_uploaded_file($_FILES['cert']['tmp_name'],"./../file/cert/".$uniqCert)) {
       
        // file uploaded
        // checks to upload to file to our image folder
        // using javascript to return result to page
        $checkPhoneNo = $db->conn->prepare("SELECT * FROM mechanic_register WHERE mobile=:mobile");
        $checkPhoneNo->bindParam(':mobile',$mobile);
        $checkPhoneNo->execute();
        if ($checkPhoneNo->rowCount()>0) {
            while ($row= $checkPhoneNo->fetch(PDO::FETCH_OBJ)) {
                $id  =$row->id;
            }
            $checkmechDoc = $db->conn->prepare("SELECT * FROM mechanic_document WHERE mechanic_id=:mech");
            $checkmechDoc->bindParam(':mech',$id);
            $checkmechDoc->execute();
            if ($checkmechDoc->rowCount()>0) {
                $data['sucess'] = false;
                $data['status']= 'error';
                $data['message']='The person has already submitted his/her details. thanks!';
            }else {
                
            
           $insertdocument = $db->conn->prepare("INSERT INTO mechanic_document(mechanic_id,image,certificate)VALUES(:mechanicId,:image,:cert)");
           $insertdocument->bindParam(':mechanicId',$id);
           $insertdocument->bindParam(':image',$uniqImg);
           $insertdocument->bindParam(':cert',$uniqCert);
           $inserted = $insertdocument->execute();
           if ($inserted) {
            $data['success'] = true;
            $data['status']= 200;
            $data['message']= 'uploaded successfully';

           }else {
            $data['success'] = false;
            $data['status']= 401;
            $data['message']= 'Not uploaded';
           }
        }

        }else {
            $data['success']= false;
            $data['status']= 'error';
            $data['message']='The phone no has not been registered in the database yet; kindly register the number or check it properly';
        }
        
        
    }
}else {
    $data['success']= false;
$data['status'] = 'error';
$data['message']= 'check your files size one of them is greater than 2.5mb';
}

}else{
    $data['success']= false;
    $data['status'] = 'error';
    $data['message']= 'check your files size one of them is less than 0mb';
}
   echo json_encode($data);
// }

?>