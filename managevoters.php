<style>
    <?php
    require "managevoters.css";
    ?>
</style>
<div class="main">
    <div>
        <h2>ALL VOTERS</h2>
    </div>
    <div>
        <table>
            <tbody>
                <tr>
                    <th>username</th>
                    <th>Regno</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
                <?php
                include('action/connection.php');
                $sql="select *from userdata ORDER by Regno ";
                $result=$con->query($sql);
                while($rows=$result->fetch_ASSOC()){
                    ?>
                    <tr>
                        <td><?php echo $rows['Username']?></td>
                        <td><?php echo $rows['Regno']?></td>
                        <td><a href="action/deletevoter.php?delete=<?php echo $rows['Regno']; ?>" class="btn btn-danger">Delete</a></td>
                         <td><a href="action/updatevoter.php?edit=<?php echo $rows['Regno']; ?>" class="btn btn-success">Edit</a></td>
                    </tr>
                    <?php
                }
                ?>
                
            </tbody>
        </table>
    </div>
</div>