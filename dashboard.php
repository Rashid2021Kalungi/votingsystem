<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        <?php
          require "./dashboard.css"
        ?>
    </style>
</head>
<body>
   <div class="main1">
       <div class="one">
           <div>
                <h2>Admin Panel</h2>
                <p>Designed by: <span>KALUNGI RASHID</span> <span1> © All rights reserved</span1></p>
           </div>
            <div>
                <a href="action/notification.php"><span><?php require "icons/bell.svg" ?></span>notification</a>
                <a href="action/admin.php"><span><?php require "icons/user.svg" ?></span>admin</a>
                <a href="action/logout.php"><span><?php require "icons/circle-user.svg"?></span>logout</a>
         </div>  
       </div> 
          
               <?php
            $home="data";
            if(isset($_GET['hm'])) $home=$_GET['hm'];
            ?>
        <nav>
        <div>
        <span><?php require "icons/bars.svg"?></span><h3>Dashboard</h3>
        </div>
             <a href="dashboard.php?ref=manageposition&hm=manage position" class="<?php if($home == 'manage position') echo "active"; ?>"><span><?php require "icons/award.svg"?></span>manage positions</a>
            <a href="dashboard.php?ref=registercandidates&hm=register candidates" class="<?php if($home == 'register candidates') echo "active"; ?>"><span><?php require "icons/users.svg"?></span>Register candidates</a>
            <a href="dashboard.php?ref=pollresults&hm=Poll Results" class="<?php if($home == 'Poll Results') echo "active"; ?>"><span><?php require "icons/box-open.svg"?></span>Poll Results</a>
            <a href="dashboard.php?ref=create_account&hm=Register Voters" class="<?php if($home == 'create_account') echo "active"; ?>"><span><?php require "icons/upload.svg"?></span>Register Voters</a>
            <a href="dashboard.php?ref=Reports&hm=reports" class="<?php if($home == 'reports') echo "active"; ?>"><span><?php require "icons/file.svg"?></span>Reports</a>
            <a href="dashboard.php?ref=managevoters&hm=Manage Voters" class="<?php if($home == 'Manage Voters') echo "active"; ?>"><span><?php require "icons/users-line.svg"?></span>Manage Voters</a>
            <a href="dashboard.php?ref=managecandidates&hm=Manage Candidates" class="<?php if($home == 'Manage Candidates') echo "active"; ?>"><span><?php require "icons/users-line.svg"?></span>Manage Candidates</a>
        </nav>
            <?php
            
            if(isset($_GET['ref'])) {
                $file=$_GET['ref'].".php";
                if(file_exists($file)) require $file;
            }
            ?>
   
   </div>
 
</body>
</html>