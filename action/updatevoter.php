<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<?php
include("connection.php");
$db= $con;
$tableName="userdata";
if(isset($_GET['edit'])){
$id = validate($_GET['edit']);
$condition= ['Regno' =>$id];
$columns= ['Username','Regno'];
$editData = edit_data($db, $tableName, $columns, $condition);
}
function edit_data($db, $tableName, $columns, $condition){
if(empty($db)){
 $msg= "Database connection error";
}elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
}elseif (!is_array($condition)) {
  $msg= "Condition data must be an associative array";
}
elseif(empty($tableName)){
  $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
    $conditionData='';
    $i=0;
    foreach($condition as $index => $data){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$data."'";
         $i++;
    }
$query = "SELECT ".$columnName." FROM $tableName";
$query .= " WHERE ".$conditionData;
$result = $db->query($query);
$row= $result->fetch_assoc();
return $row;
if($row== true){
  
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
    
 } else {
    $msg= "No Data Found";
  
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
// update data
extract($_POST);
if(isset($update) && isset($_GET['edit'])){
$updateDate = date("Y-m-d H:i:s");
$inputData = [
'name' => validate($name) ?? "",
'post'    => validate($post) ?? "",
'party'   => validate($party) ?? "",
'created_at' => $updateDate ?? ""
];
$id = validate($_GET['edit']);
$condition= ['Regno' =>$id];
$result= update_data($db, $tableName, $inputData, $condition);
header("location:form.php");
}
function update_data($db, $tableName, $inputData, $condition){
 $data = implode(" ",$inputData);
if(empty($db)){
 $msg= "Database connection error";
}elseif(empty($tableName)){
  $msg= "Table Name is empty";
}elseif(trim( $data ) == ""){
  $msg= "Empty Data not allowed to update";
}elseif(!is_array($inputData) && !is_array($condition)){
  $msg= "Input data & condition must be in array"; 
}else{
// dynamic column & input value
    $cv=0;
    $columnsAndValue='';
    foreach ($inputData as $index => $data) {
      $comma= ($cv>0)?', ':'';
      $columnsAndValue .= $comma.$index." = "."'".$data."'";
    $cv++;
    }
   
// dynamic condition       
    $conditionData='';
    $c=0;
    foreach($condition as $index => $data){
        $and = ($c>0)?', ':'';
        $conditionData .= $and.$index." = "."'".$data."'";
        $c++;
    }
// update query        
    $query   =  "UPDATE ".$tableName;
    $query  .= " SET ".$columnsAndValue;
    $query  .= " WHERE ".$conditionData;
    $execute= $db->query($query);
   
   if($execute=== true){
      $msg= "Data was updated successfully";
  }else{
      $msg= $query;
  }
}
 return $msg;
}
 function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
 }
?>
<form action="updatevoters.php" method="POST" enctype="multipart/form-data">


    <div class="main">
        <div>
            <h2>CANDIDATES REGISTRATION FORM</h2>
        </div>
        <div>
            <input type="text" placeholder="Enter candidate name" name="name" value="<?php echo $editData['Username']??''; ?>"required>
            <input type="text" placeholder="Enter the regno" name="regno" value="<?php echo $editData['Regno']??''; ?>"required>
            <button type="submit">Save</button>
            
        
        </div>
    </div>
</form>

</body>
</html>
