<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$department = mysqli_real_escape_string($con,$_POST['department']);
$course = mysqli_real_escape_string($con,$_POST['course']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$mobile = mysqli_real_escape_string($con,$_POST['mobile']);

if(!empty($course) && !empty($email) && !empty($mobile) && !empty($password) && !empty($cpassword) && !empty($department)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        if ($password != $cpassword && strlen($password) < 7) {
           echo "Password too short or not the same";
        }else{
            $sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}' ");
            if(mysqli_num_rows($sql) > 0){
                $rows = mysqli_fetch_assoc($sql);
                $sql2 = mysqli_query($con,"UPDATE users SET email = '{$email}',password = '{$password}',gender = '{$gender}',
                department = '{$department}',course = '{$course}',date = '{$date}' WHERE unique_id = '{$rows['unique_id']}'
                 ");
                if($sql2){
                    $profile = $_FILES['profile']['name'];
                    $tmp_profile = $_FILES['profile']['tmp_name'];
                    
                    $extension = ['jpg','jpeg','png'];
                    $explode = explode(".",$profile);
                    $ext = end($explode);
                    if (in_array($ext,$extension) == true) {
                       $time = time();
                       $new_profile = $time.$profile;
                       $folder = "img/".basename($new_profile);
                       if (move_uploaded_file($tmp_profile,$folder)) {
                          $sql3 = mysqli_query($con,"UPDATE users SET profile = '{$new_profile}' WHERE unique_id = '{$session_id}' ");
                          echo "success";
                       }else{
                           echo "Select image again";
                       }
                    }else{
                        echo "Image should be jpg jpeg or png";
                    }
                }else{
                    echo "Failed to update please try again";
                }
            }else{
                echo "Oops something went wrong";
            }
        }
        
    }else{
        echo $email." is invalid";
    }
}else{
    echo "All field required";
}

?>