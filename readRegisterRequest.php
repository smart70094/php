<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table=$_POST['table'];
	$originator=$_POST['originator'];
	
	
	$sql="SELECT ".$table.".*,account.uid FROM ".$table.",account WHERE subject='$originator' AND originator = account.account";
	$getUser=$dbgo->prepare($sql);
	$getUser->execute();
	$ans="";
	$arr = array();
	foreach($getUser as $datainfo) {
		$row_array['rid']=$datainfo['rid'];
		$row_array['subject']=$datainfo['subject'];
		$row_array['cmd']=$datainfo['cmd'];
		$row_array['cmdContext']=$datainfo['cmdContext'];
		$row_array['originator']=$datainfo['originator'];
		$row_array['tid']=$datainfo['tid'];
		$row_array['authID']=$datainfo['uid'];
		array_push($arr,$row_array);
	}
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>