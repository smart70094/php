<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	$tid=$_POST['tid'];
	
	$sql="SELECT uid,a,b,c,d,e,f,g FROM element WHERE tid='$tid'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	
	$arr = array();
	foreach ($result as $datainfo) {
		$row_array['uid'] = $datainfo['uid'];
		$row_array['a'] = $datainfo['a'];
		$row_array['b'] = $datainfo['b'];
		$row_array['c'] = $datainfo['c'];
		$row_array['d'] = $datainfo['d'];
		$row_array['e'] = $datainfo['e'];
		$row_array['f'] = $datainfo['f'];
		$row_array['g'] = $datainfo['g'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
?>