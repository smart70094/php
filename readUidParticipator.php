<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	$tid=$_POST['tid'];
	
	$sql ="SELECT uid FROM participator WHERE tid='$tid'";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$ans="";
	foreach ($getUser as $datainfo) {
		$ans=$ans.",".$datainfo['uid'];
	}
	
	$ans = substr($ans,1,strlen($ans));
	echo $ans;
?>