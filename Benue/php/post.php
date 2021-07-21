<?php
    session_start();
    $session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
    include "config.php";
    $message = mysqli_real_escape_string($con,$_POST['message']);

    if (!empty($message)) {
            $img = $_FILES['img']['name'];
            $tmp_img = $_FILES['img']['tmp_name'];
            $extension = ['jpg','jpeg','png'];
            $explode = explode(".",$img);
            $end = end($explode);
            if(in_array($end,$extension)== true){
                $time = time();
                $new_img = $time.$img;
                $folder = "blog/".basename($new_img);
                if(move_uploaded_file($tmp_img,$folder)){
                    $sql2 = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '{$session_id}' ");
                    $row2 = mysqli_fetch_assoc($sql2);
                    $profile = $row2['profile'];
                    $name = $row2['name'];
                    $sql = mysqli_query($con,"INSERT INTO blog(unique_id,message,img,profile,name)VALUES('{$session_id}','{$message}','$new_img','$profile','$name')");
                    if ($sql) {
                       echo "success";
                    }else{
                        echo "fail to access";
                    }
                }else{
                    echo "Failed to upload image";
                }
            }else{
                echo "Image should be jpg jpeg or png";
            }
    }else{
        echo "Text fields are required";
    }
?>