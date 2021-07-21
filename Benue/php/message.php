<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";

$sql = mysqli_query($con,"SELECT * FROM users WHERE NOT unique_id = '$session_id' ");
while( $rows = mysqli_fetch_assoc($sql)) {
   $name = $rows['name'];
   $matric = $rows['unique_id'];
   $profile = $rows['profile'];
   $status = $rows['status'];

   $output = "<div class='available-peeps'>
   <img src='php/img/".$profile."' style='width:80px; border-radius:50%; height:80px;'>
    <a href='message.php?unique_id=".$matric."'>".$name."</a>&nbsp; <i>".$status."</i>
</div>";
    echo $output;
}
?>