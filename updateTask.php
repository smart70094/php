<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
		
	$table=$_POST['table'];
	$mid=$_POST['mid'];
	$missionName=$_POST['missionName'];
	$missionContent=$_POST['missionContent'];
	$remindTime=$_POST['remindTime'];
	$tid=$_POST['tid'];
	
	$sql="UPDATE ".$table." SET missionName='$missionName' , missionContent='$missionContent' , remindTime='$remindTime' , tid='$tid' WHERE mid='$mid'";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 
?>



