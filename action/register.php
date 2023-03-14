<?php
include('connection.php');
$username=$_POST['name'];
$regno=$_POST['regno'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
// $image=$_POST['photo']['name'];
// $tmp_name=$_POST['photo']['tmp_name'];
$image=$_FILES['photo']['name'];
$destination=  "../uploads/$image";
$tmp=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];

if($pass1!=$pass2){
    echo '<script> alert("Password did not match")
    
    </script>';
    
    
    
}
elseif(strlen($regno)<10) echo '<script> alert("minimum is ten characters for regnumber")
window.location=" window.location="../dashboard.php";;
</script>';
elseif(strlen($pass1)<6) echo '<script> alert("Invalid password length")
window.location="../create_account.php";
</script>';
elseif(strlen($username)<3) echo '<script> alert("Minimum characters are three for username")
window.location=" window.location="../dashboard.php";
</script>';

else{
    move_uploaded_file($tmp,$destination);
    $sql1="select *from userdata where Regno='$regno'";
   $sql1=mysqli_query($con,$sql1);
   if(mysqli_num_rows($sql1) !=0){ 
      echo  '<script> alert("Account already exist")
     window.location=" window.location="../dashboard.php";
      </script>';
    }
    else{
        $pass=password_hash($pass1,PASSWORD_DEFAULT);
        $sql="insert into `userdata` (Username,Regno,password,photo,standard,status,votes) values('$username','$regno','$pass','$image','$std',0,0)";
         if(mysqli_query($con,$sql)){
          echo '<script> alert("Account created successfully")
            window.location="../dashboard.php";
            </script>';
           } 
         else{
             echo "Error: ".$sql. "<br>".$con->error;
         }
         $con->close();
    }
}




?>