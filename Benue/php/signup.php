<?php
session_start();
   include "config.php";

   $name = mysqli_real_escape_string($con,$_POST['name']);
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $matric = mysqli_real_escape_string($con,$_POST['matric']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
   $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
   $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

   if(!empty($name) && !empty($email) && !empty($matric) && !empty($password) && !empty($cpassword) && !empty($mobile)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($con,"SELECT * FROM users WHERE matric ='{$matric}' OR email = '{$email}' ");
            if(mysqli_num_rows($sql)>0){
                echo "Student with this matric No. or Email already exist";
            }else{
                if($password !== $cpassword){
                    echo "Password do not match";
                }else{
                    if(strlen($password)<7){
                        echo "Password too short";
                    }
                    else{
                        $status = "active";
                        $unique_id = rand(time(),1000000);
                        $sql2 = mysqli_query($con,"INSERT INTO users(unique_id,name,email,matric,password,mobile,status)
                        VALUES('{$unique_id}','{$name}','{$email}','{$matric}','{$password}','{$mobile}','{$status}')
                        ");
                        if($sql2){ 
                            $sql3 = mysqli_query($con,"SELECT * FROM users WHERE matric = '$matric' ");
                        if (mysqli_num_rows($sql3) > 0) {
                            $rows = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $rows['unique_id'];
                            echo "success";
                        }
                        }else{
                            echo "Oops something went wrong";
                        }
                    }
                }
            }
        }
        else{
            echo $email." is not a valid email";
        }
   }
   else{
       echo "All fields are required to proceed";
   }
?>