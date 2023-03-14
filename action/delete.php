<?php
include ('connection.php');
$db= $con;
$tableName="candidates";
if(isset($_GET['delete']))
{
  $id= validate($_GET['delete']);
  $condition =['id'=>$id];
  $deleteMsg=delete_data($db, $tableName, $condition);
  header("location:delete.php");
}
function delete_data($db, $tableName, $condition){
    $conditionData='';
    $i=0;
    foreach($condition as $index => $rows){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$rows."'";
         $i++;
    }
  $query= "DELETE FROM ".$tableName." WHERE ".$conditionData;
  $result= $db->query($query);
  if($result){
    $msg="data was deleted successfully";
  }else{
    $msg= $db->error;
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