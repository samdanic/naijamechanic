<?php
class DBController
{
  public $servername = "localhost";
  // public $username = "";
  // public $password = "";
  public $username = "root";
  public $password = "ukpong456";
  public $conn;

 function __construct()
    {
      $this->conn = $this->connectDB();
    }

  function connectDB()
    {
     
        $conn = new PDO("mysql:host=$this->servername;dbname=naijamechanic", $this->username, $this->password);
        if($conn){
            // echo 'successful';
        }else{
            echo 'not successful';
        }
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      
    }
  //  function certification($font1, $font2,$image, $name, $date)
  //  {
     // header('content-type:image/jpeg');
// $font = "Chomsky.otf";
// $font1 = "OpenSans-Regular.ttf";
// echo "Hi Samdan";
  // $image = imagecreatefromjpeg("certimage.jpg");
// $color = imagecolorallocate($image,0, 0, 0);
// $name = "Mr. Samuel Dan";
// $date = "01 Sept, 2021";
// imagettftext($image,150,0,2347,2107, $color, $font, $name);
// imagettftext($image,100,0,1350 ,3283, $color, $font1, $date);

// imagejpeg($image, "certs/".$name.".jpg");
// imagedestroy($image);
  //  }
  
  
  
}



?>








