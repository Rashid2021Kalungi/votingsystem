<?php 
session_start();
include ('connection.php');
$_SESSION["Regno"];
if ($_SESSION["Regno"]!="" && $_SESSION["Regno"]!="Guest") {
	$sql = "update userdata set lastaccess=now() where Regno='".$_SESSION["Regno"]."'";
	CustomQuery($sql);
}?>
<?php

$minutes=10;
$dispUsers=20;
$t=date('Y-m-d H:i:s', time()-$minutes*60);
// display users who were active in last 10 minutes

$users=DBLookup("select count(*) from userdata where lastaccess > '".$t."'");
if ($users>0) {
	$sql="select * from invusers where lastaccess > '".$t."'";
	$rs=CustomQuery($sql);

	if ($data = db_fetch_array($rs)) {
		echo $users." active user(s): ".$data["username"];
	}
	$count=1;
	while ($data = db_fetch_array($rs)) {
	  if ($count<$dispUsers) {
			$count++;
			echo ", ".$data["username"];
	  }
		else {
			echo " ...";
			break;
		}
	}
}
?>