<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	$table=$_POST['table'];
	$account=$_POST['account'];
	
	$sql="SELECT uid FROM account WHERE account='$account'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	if($uid>0)
		echo $uid;
	else
		echo "-1";
?>