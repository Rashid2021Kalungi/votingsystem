<?php
include('connection.php');
$sql="";
$action=mysqli_real_escape_string($con,$_GET['action']);
$id=mysqli_real_escape_string($con,$_GET['id']);
if($action=="delete"){
    $sql=mysqli_query($con,"delete from candidates where id='$id'");
    $page=$_SERVER['PHP_SELF'];
    $sec="10";
    header("Refresh: $sec; url=$page");
}
header("Refresh:0; url=../dashboard.php");
if(mysqli_query($con,$sql)){
    echo '<script> alert("Deletion successful")
window.location="../dashboard.php";
</script>';
}
?>