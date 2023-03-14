<form action="action/registercandidate.php" method="POST" enctype="multipart/form-data">
<style>
<?php
require "registercandidates.css"
?>
</style>

<div class="main">
    <div>
        <h2>CANDIDATES REGISTRATION FORM</h2>
    </div>
    <div>
        <input type="text"placeholder="ID numumber" name="id"  required>
        <input type="text" placeholder="Enter candidate name" name="name" value="<?php echo $editData['name']??''; ?>"required>
        <input type="text" placeholder="Enter the post" name="post" value="<?php echo $editData['post']??''; ?>"required>
        <input type="name" placeholder="Enter candidate party" name="party" value="<?php echo $editData['party']??''; ?>"required>
        <input type="file"  name="image" required>
        <button type="submit">Save</button>
        
       
    </div>
</div>
