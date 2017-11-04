<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	
	$account=$_POST['account'];
	$password=$_POST['password'];
	$state="Y";
	
	$sql = "SELECT * FROM account WHERE account='$account' AND password='$password' AND state='$state'";
	$result = $dbgo->query($sql);
	$row=$result->fetchAll();
	$arr = array();
	foreach ($row as $datainfo) {
		$row_array['uid'] = $datainfo['uid'];
		$row_array['account'] = $datainfo['account'];
		$row_array['password'] = $datainfo['password'];
		$row_array['name'] = $datainfo['name'];
		$row_array['role'] = $datainfo['role'];
		array_push($arr,$row_array);
    }
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);	
?>




