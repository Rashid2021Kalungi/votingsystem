<style>
    <?php
    require "create_account.css";
    ?>
</style>
<div class="main">
    <h1>VOTING SYSTEM</h1>
    <div class="registers">
        <h2>CREATE ACCOUNT</h2>
        <div>
            <form action="action/register.php" method="POST" enctype="multipart/form-data">
              <div>
                    <input type="text" name="name" placeholder="Enter Fullname" required="required">
                    <input type="text" name="regno" placeholder="Enter Regestration number" required="required">
                    <input type="password" name="pass1" placeholder="Enter the password" required="required">
                    <input type="password" name="pass2" placeholder="Re-Enter password to confirm" required="required">
              </div>
              <div>
                  <input type="file" name="photo">
              </div>
              <div>
                  <select name="std">
                      <option value="Group">Group</option>
                      <option value="Voter">Voter</option>
                  </select>
              </div>
              <button type="submit">create Account</button>
            </form>
        </div>
    </div>
</div>
