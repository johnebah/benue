<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";
$incoming_id = mysqli_real_escape_string($con,$_POST['incoming_id']);
$output = '';
$null = '';
$sql = mysqli_query($con,"SELECT * FROM messages WHERE outgoing_id={$session_id} AND incoming_id={$incoming_id} 
OR outgoing_id ={$incoming_id} AND incoming_id={$session_id}");
if(mysqli_num_rows($sql) > 0){
    while($rows=mysqli_fetch_assoc($sql)){
        $message = $rows['messages'];
        if($rows['outgoing_id'] == $session_id){
            $output = "<div class='header-middle-right' style=''>
                            <p>".$message."</p>
                         </div>
                         ";
        }else{
            
            $sql2 = mysqli_query($con,"SELECT * FROM users WHERE unique_id ={$incoming_id} ");
            if(mysqli_num_rows($sql2) > 0){
                $rows2 = mysqli_fetch_assoc($sql2);
                $profile = $rows2['profile'];
            $output= "
                        <div class='header-middle-left'>
                         <p>".$message."</p>
                        </div>";
            }else{
                $output = "";
            }
        }
        echo $output;
    }
}
?>