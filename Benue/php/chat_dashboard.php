<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";
$message = mysqli_real_escape_string($con,$_POST['message']);
$incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
if (!empty($message)) {
 

$sql2  = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '$session_id' ");
if(mysqli_num_rows($sql2) > 0){
    $rows = mysqli_fetch_assoc($sql2);
    $unique_id = $rows['unique_id'];
    $sql = mysqli_query($con,"INSERT INTO messages(outgoing_id,incoming_id,messages)
    VALUES({$unique_id},{$incoming_id},'{$message}') ") or die();
if($sql) {
   echo "success";
}else{
    echo "failed to send message";
}
}
}else{
    echo "input all fied";
}


?>