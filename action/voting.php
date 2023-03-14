<?php
session_start();
include('connection.php');
$id=$_SESSION['Regno'];
$candid=$_POST['id'];
$votes=$_POST['votes'];
$totalvotes=$votes ++;
// $vote="select *from `userdata` where status=1";
// $vote=mysqli_query($con,$vote);
// if(mysqli_num_rows($vote)!=0){
//     echo '<script> alert("you can only vote once")   
//     window.location="index.php";
//             </script>';
// }
            $sql="update `candidates` set votes='$totalvotes' where id='$candid'";
        $result=mysqli_query($con,$sql);
        $sql1=mysqli_query($con,"update `userdata` set status=1 where Regno='$id'");
        if($result and $sql1){
            echo '<script> alert("Thanx for voting")   
            window.location="../voters/voterdashboard.php";
                    </script>';
                
        }
   


?>