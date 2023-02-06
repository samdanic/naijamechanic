<?php
session_start();
// include('./../controllers/authentication.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION["ID"] = 100;
    include('../database/connection1.php');
    $response = createHospitalTableIfNotExist($conn);
    $response1 = checkIfArtisanExists($conn);
    if ($response == 1 &&$response1==0) {
        // $data['success'] = true;
        // $data['status'] = '200';
        // $data['message'] = 'successfully registred!';
        // echo json_encode($data);
        if ($response1==1) {
            $data['success'] = false;
            $data['status'] = 'error';
            $data['message'] = 'Phone No. already registered';
            echo json_encode($data);
        
        }else {
            insertMember($conn);    
        }
       
    } else {
        $data['success'] = false;
        $data['status'] = 'error';
        $data['message'] = 'Phone No. already registered';
        echo json_encode($data);
    }
    
} else {
    $data['success'] = false;
    $data['status'] = 'error';
    $data['message'] = 'not safe';
    echo json_encode($data);
}

function test_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);
    return $data;
}

function checkIfArtisanExists($conn)
{
    $mobile = test_data($_POST['mobile']);
    // $email = strtolower($email);
    $query =  "SELECT * from mechanic_register WHERE mobile = '" . mysqli_real_escape_string($conn, $mobile) . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        return false;
    } elseif ($row = mysqli_fetch_assoc($result)) {
        if ($row['mobile'] === $mobile) {
            return true;
        } else {
            return false;
        }
    }
}


function createHospitalTableIfNotExist($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS mechanic_register (
        id INT(20) UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
        fullname varchar(255) DEFAULT NULL,
        mobile varchar(256) NOT NULL,
        profession varchar(256) NOT NULL,
        workshop varchar(256) NOT NULL,
        association varchar(256) NOT NULL,
        gender varchar(256) NOT NULL,
        dob varchar(256) NOT NULL,
        state varchar(256) NOT NULL,
        lga varchar(256) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    if (mysqli_query($conn, $sql) == 1) {
        return true;
    } else {
        return false;
    }
}


function insertMember($conn)
{
    try {
        $firstname = test_data($_POST['firstname']);
        $lastname = test_data($_POST['lastname']);
        $state = test_data($_POST['state']);
        $lga = test_data($_POST['lga']);
        $workshop = test_data($_POST['workshop']);
        $profession = test_data($_POST['profession']);
        $association = test_data($_POST['association']);
        $dob = test_data($_POST['dob']);    
        $gender = test_data($_POST['gender']); 
        $mobile = test_data($_POST['mobile']); 
      $_SESSION['mobile'] = $mobile;

        $fullname = "{$lastname} {$firstname}";

        // if ($file['size'] > 0) {
            // if file submitted is greater than 0 it will run
            // if ($_FILES['file']['size'] <= 253000000 ) {
              // if file submitted is less than 2.5mb it will run
            //   move_uploaded_file($_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']);
              
                // file uploaded
                // checks to upload to file to our image folder
                // using javascript to return result to page
                // $file_name = "images/".$file;
                // $_SESSION['filename'] = $file_name;
                // echo $file_name;
                
        

                if (!empty($mobile)){
                        $query = "INSERT INTO mechanic_register (fullname,mobile,profession,workshop,association,gender,dob,state, lga) VALUES ('" . mysqli_real_escape_string($conn, $fullname) . "','" . mysqli_real_escape_string($conn,  $mobile) . "','" . mysqli_real_escape_string($conn, $profession) . "','".  mysqli_real_escape_string($conn, $workshop) . "','".   mysqli_real_escape_string($conn, $association) . "','". mysqli_real_escape_string($conn, $gender) . "','" . mysqli_real_escape_string($conn, $dob) .  "','" . mysqli_real_escape_string($conn, $state). "','" . mysqli_real_escape_string($conn, $lga)."');";
                    $result = mysqli_query($conn, $query);
                    if ($result == 0) {
                        $data['success'] = false;
                        $data['status'] = 200;
                        $data['message'] = "Error while registering ";
                    } else {
                        
                        
                            $data['mobile']=$mobile;
                            $data['success'] = true;
                        $data['status'] = 200;
                        $data['message'] = "You've successfully registered. Thank you!";
                    
                
            }
            }
         else {
            $data['success'] = false;
            $data['status'] = 403;
            $data['message'] = "Error Occured!";
        }
    
// }else {
//     echo "the image is larger than 2.5mb, try another photo that is below 2.5mb";
// }
// }else {
//     echo "upload an image please";
// }
    } catch (Exception $error) {
        $data['success'] = false;
        $data['status'] = 500;
        $data['message'] = $error->getMessage();
    }

    echo json_encode($data);
}
