<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$tid=$_POST['tid'];
    $sql = "SELECT targetName,targetContent,targetStartTime,targetEndTime FROM target WHERE tid='$tid'";
	
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$arr = array();
	foreach ($getUser as $datainfo) {
		$row_array['targetName'] = $datainfo['targetName'];
		$row_array['targetContent'] = $datainfo['targetContent'];
		$row_array['targetStartTime'] = $datainfo['targetStartTime'];
		$row_array['targetEndTime'] = $datainfo['targetEndTime'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
	
?>