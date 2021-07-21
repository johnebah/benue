<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "php/config.php";
$incoming_id = $_GET['unique_id'];                                   
 $sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '$incoming_id' ");
if (mysqli_num_rows($sql) > 0) {
    $rows = mysqli_fetch_assoc($sql);
    $profile = $rows['profile'];
     $name = $rows['name'];
    $status = $rows['status'];
}
?>
<p><a href="chat.php"><i class="fas fa-long-arrow-alt-left"></i></a>&nbsp;&nbsp;&nbsp;<img src="php/img/<?php echo $profile; ?>"><?php echo $name; ?><br>
    <span><?php echo $status; ?></span>
</p>