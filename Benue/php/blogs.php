<?php
    session_start();
    $session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
    include "config.php";

    $sql = mysqli_query($con,"SELECT * FROM blog");
    if(mysqli_num_rows($sql) > 0){
        while($rows = mysqli_fetch_assoc($sql)){
        $unique_id = $rows['unique_id'];
        $message = $rows['message'];
        $img = $rows['img'];
        $profile = $rows['profile'];
        $name = $rows['name'];
        $id = $rows['id'];
        $date = $rows['dates'];
          $output = "<div class='posts' style='padding: 20px; border: 5px solid white;'>
          <div class='post-owner'>
              <img src='php/img/".$profile."' alt='name'>
              <p>".$name."</p>
              <p>".$date."</p>
          </div>
          <div class='post-content'>
          <img src='php/blog/".$img."' alt='name' style='width:80%; height:70%;'><br><br>
          <p style='word-wrap:break-word;'>".$message."</p> 
          
          <a href='show_delete.php'><button class='btn btn-danger'>Delete post</button></a>
         
          </div>
         

      </div>";
        echo $output;

   
}
}
?>