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
	$uid=$_POST['uid'];
	$collaborator=$_POST['collaborator'];
	
	$sql="SELECT account FROM account WHERE uid='$uid'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$auth= $result->fetchColumn(); 
	echo $auth;
	
	
	$sql="SELECT account FROM account WHERE uid='$collaborator'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid_collaborator= $result->fetchColumn(); 
	echo $auth;

	
	$sql="UPDATE ".$table." SET collaborator='$uid_collaborator' WHERE tid='$tid' AND auth='$auth'";
	$result = $dbgo->prepare($sql); 
	echo $result->execute();
?>



