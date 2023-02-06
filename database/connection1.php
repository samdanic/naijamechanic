<?php
$dbServer = "localhost";
$dbUserName = 'root';
$dbPassword = "ukpong456";
// $dbUserName = 'ruawicom_admin';
// $dbPassword = "V3DkwG4cN56)l(";
$databaseName = "naijamechanic";


$conn = mysqli_connect($dbServer, $dbUserName, $dbPassword, $databaseName);

if (!$conn) {
    echo "No connection " . mysqli_connect_error($conn) . $dbServer;
    // die('Connection failed' . mysqli_connect_error($conn));
} else {
    return "Connection Established";
}
// mysqli_close($conn);