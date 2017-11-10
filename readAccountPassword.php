<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	
	$account=$_POST['account'];
	
	$sql="SELECT account,password FROM account WHERE account='$account'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	
	foreach ($result as $datainfo) {
		$data=$datainfo['password'];
		break;
	}
	echo $data;
?>