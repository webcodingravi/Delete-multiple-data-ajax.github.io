<?php
$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed");

$sql = "SELECT * FROM student";

$result = mysqli_query($conn, $sql) or die("Query failed");

$output = "";

if(mysqli_num_rows($result) > 0) {
    $output .= "<table class='table table-bordered mt-2'>
                <tr class='bg-primary text-white'>
                <td>S.NO</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Age</td>
                <td>City</td> </tr>";
    
         while($row = mysqli_fetch_assoc($result)) {
             $output .= "<tbody
                     <tr>
                     <td><input type='checkbox' value='{$row['id']}'></td>
                     <td>{$row['stu_name']}</td>
                     <td>{$row['last_name']}</td>
                     <td>{$row['Age']}</td>
                     <td>{$row['City']}</td>
                     </tr>
                   </tbody>";
                }
    
      $output .= "</table>";     
      
      echo $output;
} else{
    echo "<h2>No Record Found.</h2>";
}



?>