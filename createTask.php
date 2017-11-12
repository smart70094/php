<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="mission";
	
	$sql="SELECT mid+1 FROM mission ORDER BY mid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$mid= $result->fetchColumn(); 
	echo $mid;
	
	$missionName=$_POST['missionName'];
	$missionContent=$_POST['missionContent'];
	$remindTime=$_POST['remindTime'];
	$tid=$_POST['tid'];
	$state="N";
	$auth=$_POST['auth'];
	
	//echo $table.",".$mid .",".$missionName.",".$missionContent.",".$remindTime.",".$tid.",".$planet.",".$state.",".$auth.'<br>';
	
	$sql ="INSERT INTO ".$table." (mid,missionName,missionContent,remindTime,tid,state,auth,collaborator)  VALUES ( '$mid','$missionName','$missionContent','$remindTime','$tid','$state','$auth','NULL')";  //新增資料
	echo $dbgo->exec($sql);
	
	
?>