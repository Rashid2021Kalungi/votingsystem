<?php
session_start();
include ('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$post=$_POST['post'];
$party=$_POST['party'];
$image=$_FILES['image']['name'];
$desitination="../candpics/$image";
$tmp=$_FILES['image']['tmp_name'];


move_uploaded_file($tmp,$desitination);
$sql="select *from candidates where id='$id'";
$sql=mysqli_query($con,$sql);
// $data=mysqli_fetch_all($sql);

if(mysqli_num_rows($sql)!=0)
echo '<script> alert("The id already exist")
window.location="../dashboard.php";
</script>';
else{
    $sql1="insert into `candidates` (id,name,post,party,image,votes) values('$id','$name','$post','$party','$image',0)";
    if(mysqli_query($con,$sql1)){
        echo '<script> alert("Candidate added sucessfully")
window.location="../dashboard.php";
</script>';
    }

}

?>
