<?php
session_start();
include ('connection.php');
$candid=$_POST['id'];
$id=$_SESSION['Regno'];
$votes=$_POST['votes'];
$totalvotes=$votes ++;

$sql="update `candidates` set votes='$totalvotes' where id='$candid'";
$result=mysqli_query($con,$sql);
$sql1=mysqli_query($con,"update `userdata` set status=1 where Regno='$id'");
if($result and $sql1){
    echo '<script> alert("Thanx for voting")   
    window.location="../voters/voterdashboard.php";
            </script>';
        
}
else{
    echo '<script> alert("Something went wrong please try again after some time")
    window.location="../voters/voterdashboard.php"; </script>';
}
?>