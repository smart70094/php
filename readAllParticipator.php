<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="participator";
	
	
	$sql ="SELECT * FROM participator";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	
	$arr = array();
	foreach ($getUser as $datainfo) {
		$row_array['tid']=$datainfo['tid'];
		$row_array['uid']=$datainfo['uid'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>