<?php
session_start();
  include('./../../database/connection1.php');
  if ($_SERVER['REQUEST_METHOD'] == "POST")
   {

    function test_data($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlentities($data);
        return $data;
    }
    function checkIfAccesscodeExist($conn)
    {
        $access = test_data($_POST['access']);
        // $email = strtolower($email);
        $query =  "SELECT * from accesscode WHERE access_code  = '" . mysqli_real_escape_string($conn, $access) . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            return false;
        } elseif ($row = mysqli_fetch_assoc($result)) {
            if ($row['access_code'] === $access) {
                return true;
            } else {
                return false;
            }
        }
    }

    function checkIfEmailExist($conn)
    {
        $email = test_data($_POST['email']);
        // $email = strtolower($email);
        $query =  "SELECT * from admin_register WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            return false;
        } elseif ($row = mysqli_fetch_assoc($result)) {
            if ($row['email'] === $email) {
                $_SESSION['password'] = $row['password'];
                $_SESSION['email']=$row['email'];
                return true;
            } else {
                return false;
            }
        }
    }

        $access_code = test_data($_POST['access']);
        $email = test_data($_POST['email']);
        $password = test_data($_POST['password']);
        $response = checkIfAccesscodeExist($conn);
        if ($response==1) {
            // $data['success'] = true;
            // $data['status'] = 200;
            // $data['message'] = 'Access code exists';
            // echo json_encode($data);
            $checkemail = checkIfEmailExist($conn);
        if ( $checkemail==1) {
            // $data['success'] = true;
            // $data['status'] = 200;
            // $data['message'] = 'Email address exists';
            // echo json_encode($data);
            $pass = password_verify($password, $_SESSION['password']);
            if ($pass) {
                // $data['success'] = true;
                // $data['status'] = 200;
                // $data['message'] = 'password exists';
           
            }else {
                $data['success'] = false;
                $data['error'] = 'error';
                $data['message'] = 'The password is incorrect';
                echo json_encode($data);
        }
    }else {
        $data['success'] = false;
                $data['error'] = 'error';
                $data['message'] = 'Email does not exist';
                echo json_encode($data);
    }
    }else {
        $data['success'] = false;
        $data['error'] = 'error';
        $data['message'] = 'Access Code does not exist';
        
        echo json_encode($data);
    }

    if ($response && $checkemail && $pass) {
        $data['success'] = true;
        $data['status'] = 200;
        $data['message'] = 'done';
        echo json_encode($data);
        // header('location:./../index.php');
    }


}

?>