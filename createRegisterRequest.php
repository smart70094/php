<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	$table="registerrequest";
	$originator=$_POST['originator'];
	$cmd=$_POST['cmd'];
	$cmdContext=$_POST['cmdContext'];
	$subject=$_POST['subject'];
	$tid=$_POST['tid'];
	
	
	
	$sql="SELECT rid FROM ".$table." ORDER BY rid DESC LIMIT 1";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$rid= $result->fetchColumn()+1; 
	//echo $rid.",".$originator.",".$cmd.",".$cmdContext.",".$subject;
	
	
	$sql="INSERT INTO ".$table." (rid, originator, cmd, cmdContext, subject, tid) VALUES ('$rid', '$originator', '$cmd', '$cmdContext', '$subject', '$tid')";
	$result = $dbgo->prepare($sql); 
	echo $result->execute();
	
?>