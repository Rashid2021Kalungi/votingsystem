      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Voting system</title>
          <link rel="stylesheet" href="voterdashoboard.css">
          <?php
          include ('../action/connection.php');
          ?>
      </head>
      <body>
         <div class="main">
              <!-- nav-bar starts -->
                <section class="nav_bar">  
                            <div>
                                    <h2>Voter's Panel</h2>
                                    <p>Designed by: <span>KALUNGI RASHID</span></p>
                            </div>
                                <div>
                                    <a href="../action/notification.php"><span class="icons"><?php require "../icons/bell.svg" ?></span>notification</a>
                                    <a href="#"><span class="icons"><?php require "../icons/user.svg" ?></span>admin</a>
                                    <a href="../action/logout.php"><span class="icons"><?php require "../icons/circle-user.svg"?></span>logout</a>
                                </div>  
                </section>
                <!-- nav-bar ends -->

                <!-- candidate section starts -->
        <section class="candidate">
            <div class="box-container">
                    <?php
                    $sql="select *from candidates ORDER by id ";
                    $record=$con->query($sql);
                    while($record1=$record->fetch_ASSOC()){
                        ?>
                       <div class="box">
                               <div class="image">
                                    <img src="../candpics/ <?php echo $record1['image'] ?>" alt="">
                                </div>
                                        <div class="content">
                                            
                                            <div class=cand>Name: <span><?php echo $record1['name']?></span></div>
                                            <div class=cand>Post: <span><?php echo $record1['post']?></span></div>
                                            <div class=cand>Party: <span><?php echo $record1['party']?></span></div>
                                        </div>
                                        <form action="../action/vote.php" method="post">
                                            <input type="hidden" name="id" <?php echo $record1['id']?>>
                                            <input type="hidden" name="votes" <?php echo $record1['votes']?>>
                                            <button type=submit class="btn">Vote</button>
                                        </form>
                                            
                        </div>
                                    <?php
                    }
                                ?>            
               
            </div>
        </section>
                <!-- candidate section ends -->
                <!-- footer section begins -->
                <section class="footer">
                    <hr>
                    <p>Designed by Kalungi Rashid <span> © All rights reserved</span></p>
                </section>
                <!-- footer section ends -->
         </div>
    </body>
</html>