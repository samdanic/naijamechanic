<?php
// include('./../controllers/authentication.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION["ID"] = 100;
    include('../database/connection1.php');
    $response = createHospitalTableIfNotExist($conn);
    $response1 = checkIfHospitalExist($conn);
    if ($response == 1 &&$response1==0) {
        // $data['success'] = true;
        // $data['status'] = '200';
        // $data['message'] = 'successfully registred!';
        // echo json_encode($data);
        if ($response1==1) {
            $data['success'] = false;
            $data['status'] = 'error';
            $data['message'] = 'Email already registered';
            echo json_encode($data);
        
        }else {
            insertMember($conn);    
        }
       
    } else {
        $data['success'] = false;
        $data['status'] = 'error';
        $data['message'] = 'Email already registered';
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

function checkIfHospitalExist($conn)
{
    $email = test_data($_POST['email']);
    // $email = strtolower($email);
    $query =  "SELECT * from admin_register WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        return false;
    } elseif ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] === $email) {
            return true;
        } else {
            return false;
        }
    }
}


function createHospitalTableIfNotExist($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS admin_register (
        id INT(20) UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
        fullname varchar(255) DEFAULT NULL,
        association varchar(256) NOT NULL,
        address varchar(256) NOT NULL,
        email varchar(256) NOT NULL,
        phoneNo varchar(256) NOT NULL,
        password varchar(256) NOT NULL,
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
        $fullname = test_data($_POST['name']);
        $association = test_data($_POST['association']);
        $address = test_data($_POST['address']);
        $email = test_data($_POST['email']);
        $phone_no = test_data($_POST['phone_no']);
        $password = test_data($_POST['password']);    
        $password1 = password_hash($password, PASSWORD_DEFAULT);

        if (!empty($email)){
                $query = "INSERT INTO admin_register (fullname,association,address,email,phoneNo,password) VALUES ('" . mysqli_real_escape_string($conn, $fullname) . "','" . mysqli_real_escape_string($conn,  $association) . "','" . mysqli_real_escape_string($conn, $address) . "','".  mysqli_real_escape_string($conn, $email) . "','". mysqli_real_escape_string($conn, $phone_no) . "','" . mysqli_real_escape_string($conn, $password1) . "');";
                $result = mysqli_query($conn, $query);
                if ($result == 0) {
                    $data['success'] = false;
                    $data['status'] = 200;
                    $data['message'] = "Error while registering ";
                } else {
                   
                        $data['success'] = true;
                        $data['status'] = 200;
                        $data['message'] = "You've successfully registered on NATA platform. Thank you!";
                    
                }
            }
         else {
            $data['success'] = false;
            $data['status'] = 403;
            $data['message'] = "Error Occured!";
        }
    } catch (Exception $error) {
        $data['success'] = false;
        $data['status'] = 500;
        $data['message'] = $error->getMessage();
    }

    echo json_encode($data);
}
