<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table=$_POST['table'];
	
	
	$sql="SELECT tid+1 FROM target ORDER BY tid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$tid= $result->fetchColumn(); 
	echo $tid;

?>