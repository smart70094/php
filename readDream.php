<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$tid=$_POST['tid'];
	$auth=$_POST['auth'];
	
	$sql ="SELECT dream FROM mission WHERE (tid = '$tid') AND (auth = '$auth')";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$dream= $result->fetchColumn(); 
	echo $dream;
?>