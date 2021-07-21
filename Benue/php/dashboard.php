<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";

$sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '{$session_id}' ");
if (mysqli_num_rows($sql) > 0) {
   $rows = mysqli_fetch_assoc($sql);
   $name = $rows['name'];
   $matric = $rows['matric'];
   $profile = $rows['profile'];

   $output = "<img src='php/img/".$profile."'alt='Profile pic' id='profile'>
             <p id='matric'>".$matric."</p>
            <span id='namer'>".$name."</span>";
    echo $output;
}
?>