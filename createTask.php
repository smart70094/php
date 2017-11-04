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
	$planet=$_POST['planet'];
	$state=$_POST['state'];
	$auth=$_POST['auth'];
	trim($mid," ");
	
	//echo $table.",".$mid .",".$missionName.",".$missionContent.",".$remindTime.",".$tid.",".$planet.",".$state.",".$auth.'<br>';
	
	$sql ="INSERT INTO ".$table." (mid,missionName,missionContent,remindTime,tid,planet,state,auth,collaborator)  VALUES ( '$mid','$missionName','$missionContent','$remindTime','$tid','$planet','$state','$auth','NULL')";  //新增資料
	echo $dbgo->exec($sql);
	
	
?>