<?php
    session_start();
    include "config.php";
    $matric = mysqli_real_escape_string($con,$_POST['matric']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if (!empty($matric) && !empty($password)) {
       $sql = mysqli_query($con,"SELECT * FROM users WHERE matric = '{$matric}' AND password = '{$password}' ");
       if (mysqli_num_rows($sql) > 0) {
            $rows = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $rows['unique_id'];
            echo "success";
       }else{
           echo "Invalid user name or password";
       }
    }
    else{
        echo "All fields are required";
    }
?>