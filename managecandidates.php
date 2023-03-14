<style>
    <?php
require "managecandidates.css"

?>
</style>
<div class="main">
    <div><h2>MANAGE CANDIDATES</h2></div>
    <div>            
      
        <table>
         <tbody>
                <tr>
                            <th>Candidate id</th>
                            <th>Candidate name</th>
                            <th>Candidate post</th>
                            <th>party</th>
                            <th>delete</th>
                            <th>Update</th>
                            
                    </tr>

                
                <?php
                include ('action/connection.php');
                $sql="select *from candidates ORDER BY id DESC";
                $result=$con->query($sql);
                while($rows=$result->fetch_ASSOC()){
                    ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['post'];?></td>
                        <td><?php echo $rows['party'];?></td>
                    
                        
                        <td><a href="action/delete.php?delete=<?php echo $rows['id']; ?>">Delete</a></td>
                         <td><a href="action/update.php?edit=<?php echo $rows['id']; ?>">Edit</a></td>
                        
                    </tr>
           </tbody>
            <?php
             }
            ?>
        </table> 
        
    </div>
</div>