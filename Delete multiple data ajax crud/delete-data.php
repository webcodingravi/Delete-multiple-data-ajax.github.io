<?php

$student_id = $_POST['id'];

$str = implode("," ,$student_id);


$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$sql = "DELETE FROM student WHERE id IN ({$str})";

if(mysqli_query($conn, $sql)) {
 echo 1;
}else{
  echo 0;
}


?>