<?php
include ('connection.php');
$name=$_POST['name'];
$regno=$_POST['regno'];
$sql="update `userdata` set Username='$name' where Regno='$regno'";
if(mysqli_query($con,$sql)){
    echo '<script> alert("update successful")
window.location="../dashboard.php";
</script>';
}
?>