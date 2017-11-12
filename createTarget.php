<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="target";
	
	$sql="SELECT tid+1 FROM target ORDER BY tid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$tid= $result->fetchColumn(); 
	
	
	$targetName=$_POST['targetName'];
	$targetContent=$_POST['targetContent'];
	$targetStartTime=$_POST['targetStartTime'];
	$targetEndTime=$_POST['targetEndTime'];
	$state="N";
	$auth=$_POST['auth'];
	
	$sql ="INSERT INTO ".$table." (tid,targetName,targetContent,targetStartTime,targetEndTime,state,auth)  VALUES ( '$tid','$targetName','$targetContent','$targetStartTime','$targetEndTime','$state','$auth')";  //新增資料
	$dbgo->exec($sql);
    echo $tid;
	
		
	
	//echo $table.",".$tid .",".$targetName.",".$targetContent.",".$targetStartTime.",".$targetEndTime.",".$state.",".$auth.",".$dream.'<br>';
?>