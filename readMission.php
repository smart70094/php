<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$tid=$_POST['tid'];

	$sql ="SELECT mission.*,account.uid AS authID FROM mission,account WHERE (tid LIKE '%$tid%') AND account.account = auth";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$arr = array();
	
	foreach ($getUser as $datainfo) {
		$row_array['mid'] = $datainfo['mid'];
		$row_array['missionName'] = $datainfo['missionName'];
		$row_array['missionContent'] = $datainfo['missionContent'];
		$row_array['remindTime'] = $datainfo['remindTime'];
		$row_array['tid'] = $datainfo['tid'];
		$row_array['state'] = $datainfo['state'];
		$row_array['auth'] = $datainfo['auth'];
		$row_array['collaborator'] = $datainfo['collaborator'];
        $row_array['authID'] = $datainfo['authID'];
		
		
		//echo $datainfo['targetName'] . "," .$datainfo['targetContent'] . "," .$datainfo['targetStartTime'] . "," .$datainfo['targetEndTime'] . "," .$datainfo['state'] . "," .$datainfo['auth']. '<br>';
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
	
?>