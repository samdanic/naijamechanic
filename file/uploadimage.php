<?php
$name =$_FILES['pic']['tmp_name'];
move_uploaded_file($_FILES['pic']['tmp_name'],"images/".uniqid());
move_uploaded_file($_FILES['cert']['tmp_name'],"cert/".uniqid());

$data[]
?>