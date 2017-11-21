<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
    $sql = "SELECT tid FROM target WHERE tid!=0";
	//$sql ="SELECT * FROM participator,target WHERE participator.uid='$user' AND participator.tid=target.tid";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	
	$result="";
	foreach ($getUser as $datainfo) 
		$result=$result.",".$datainfo['tid'];
		
	$result = substr($result,1,strlen($result));
	echo $result;	
	
?>