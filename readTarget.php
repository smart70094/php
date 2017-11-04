<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$user=$_POST['user'];
	$sql ="SELECT * FROM participator,target WHERE participator.uid='$user' AND participator.tid=target.tid";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$arr = array();
	foreach ($getUser as $datainfo) {
		$row_array['tid'] = $datainfo['tid'];
		$row_array['targetName'] = $datainfo['targetName'];
		$row_array['targetContent'] = $datainfo['targetContent'];
		$row_array['targetStartTime'] = $datainfo['targetStartTime'];
		$row_array['targetEndTime'] = $datainfo['targetEndTime'];
		$row_array['state'] = $datainfo['state'];
		$row_array['auth'] = $datainfo['auth'];
		//echo $datainfo['targetName'] . "," .$datainfo['targetContent'] . "," .$datainfo['targetStartTime'] . "," .$datainfo['targetEndTime'] . "," .$datainfo['state'] . "," .$datainfo['auth']. '<br>';
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
	
?>