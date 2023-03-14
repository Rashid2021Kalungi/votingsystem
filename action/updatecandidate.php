<?php
include ('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$post=$_POST['post'];
$party=$_POST['party'];
$sql="update `candidates` set name='$name',post='$post',party='$party' where id='$id'";
if(mysqli_query($con,$sql)){
    echo '<script> alert("update successful")
window.location="../dashboard.php";
</script>';
}
?>