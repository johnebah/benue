<?php
    session_start();
    $session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
    include "config.php";
    $table_id = mysqli_real_escape_string($con,$_GET['table_id']);
    $inserted_id = mysqli_real_escape_string($con,$_GET['inserted_id']);
    echo $inserted_id;
    // if ($inserted_id == $session_id) {
    //    $sql = mysqli_query($con,"DELETE FROM blog WHERE id == '$table_id' ");
    //    if($sql){
    //        echo "success";
    //    }else{
    //        echo "Oops something went wrong";
    //    }
    // }else{
    //     echo "Sorry you cant delete this post!!";
    // }
?>