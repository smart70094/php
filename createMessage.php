<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="message";
	
	$sql="SELECT msgid+1 FROM ".$table." ORDER BY msgid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$msgid= $result->fetchColumn(); 
	
	
	$tid=$_POST['tid'];
	$subject=$_POST['subject'];
	
	$sql="SELECT uid FROM account WHERE account='$subject'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	
	
	$context=$_POST['context'];
	$originator=$_POST['originator'];
	$date=$_POST['date'];
	
	$sql ="INSERT INTO ".$table." (msgid,tid,uid,context,originator, date)  VALUES ( '$msgid','$tid','$uid','$context','$originator','$date')";  //新增資料
	$result =$dbgo->prepare($sql);
	echo $result->execute();

?>