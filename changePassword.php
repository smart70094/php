<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	$uid=$_POST['uid'];
	$password=$_POST['password'];
	
	$sql ="UPDATE account SET password='$password' WHERE uid='$uid'";
	echo $dbgo->exec($sql);
?>