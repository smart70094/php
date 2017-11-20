<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="message";
	
	$sql="SELECT mid+1 FROM ".$table." ORDER BY mid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$mid= $result->fetchColumn(); 
	
	
	$tid=$_POST['tid'];
	$uid=$_POST['uid'];
	$context=$_POST['context'];
	$originator=$_POST['originator'];
	
	$sql ="INSERT INTO ".$table." (mid,tid,uid,context,originator)  VALUES ( '$mid','$tid','$uid','$context','$originator')";  //新增資料
	$result =$dbgo->prepare($sql);
	echo $result->execute();

?>