<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "config.php";

$sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id  = '{$session_id}' ");
if (mysqli_num_rows($sql) > 0) {
    $rows = mysqli_fetch_assoc($sql);
    $department = $rows['department'];
    $name = $rows['name'];
    $course = $rows['course'];
    $gender = $rows['gender'];
    $email = $rows['email'];
    $mobile = $rows['mobile'];
    $date = $rows['date'];

    $output = "<table>
    <tr>
        <td>Name:</td><td>".$name."</td>
    </tr>
    <tr>
        <td>Department:</td><td>".$department."</td>
    </tr>
    <tr>
        <td>Course</td><td>".$course."</td>
    </tr>
    <tr>
        <td>Current level:</td><td>200 Level</td>
    </tr>
    <tr>
        <td>Email:</td><td>".$email."</td>
    </tr>
    <tr>
        <td>Gender:</td><td>".$gender."</td>
    </tr>
    <tr>
        <td>Date of birth:</td><td>".$date."</td>
    </tr>
    <tr>
        <td>Phone No.:</td><td>".$mobile."</td>
    </tr>
</table>";
echo $output;
}
?>