<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$auth=$_POST['auth'];
	$state="N";
	$sql ="SELECT mid,missionName,remindTime FROM mission WHERE auth='$auth' AND state='$state'";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$arr = array();
	
	foreach ($getUser as $datainfo) {
		$row_array['mid'] = $datainfo['mid'];
		$row_array['missionName'] = $datainfo['missionName'];
		$row_array['remindTime'] = $datainfo['remindTime'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
	
?>