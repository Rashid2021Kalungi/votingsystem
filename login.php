<?php
session_start();
include('action/connection.php');
$regno=$_POST['regno'];
$name=$_POST['username'];
$pass=$_POST['pass'];
$std=$_POST['std'];
    $sql="select *from `userdata` where Username='$name' and Regno='$regno' and standard='$std'";
$sql=mysqli_query($con,$sql);
if(mysqli_num_rows($sql)!=0){
    $data=mysqli_fetch_array($sql);
    $_SESSION['Username']=$data['Username'];
    $_SESSION['Regno']=$data['Regno'];
    $_SESSION['standard']=$data['standard'];
    $_SESSION['status']=$data['status'];
    $_SESSION['data']=$data;
    // $sql1="select *from `userdata` where Username='$name' and Regno='$regno' and password='$pass'and standard='Group'";
    // $sql1=mysqli_query($con,$sql1);
    // if(mysqli_num_rows($sql1)!=0){
    //     echo '<script> alert("Login successful")
    //     window.location="dashboard.php";
    //     </script>';
    // }
    // else{
    echo '<script> alert("Login successful")
    window.location="voters/voterdashboard.php";
    </script>';
    // }
}
else{
    echo '<script> alert("Wrong credentials")
    window.location="index.php";
    </script>';
}
?>