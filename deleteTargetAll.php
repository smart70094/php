<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table=$_POST['table'];
	$tid=$_POST['tid'];
	
	$sql ="DELETE FROM "."participator"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 
	
	$sql ="DELETE FROM ".$table." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 
	
	
	
	
?>