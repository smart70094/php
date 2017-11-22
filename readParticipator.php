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

    $arr = array();
	foreach ($getUser as $datainfo) {
        $uid=$datainfo['uid'];
		$row_array['uid'] = $uid;
        
		$sql ="SELECT * FROM account WHERE uid='$uid'";
		$getUser2=$dbgo->prepare($sql);
		$getUser2->execute();
        
		foreach($getUser2 as $datainfo2) 
				$row_array['account']=$datainfo2['account'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	

?>