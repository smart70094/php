<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="mission";
	$tid=$_POST['tid'];
	$auth=$_POST['auth'];
	$collaborator=$_POST['collaborator'];

	$sql="UPDATE ".$table." SET collaborator='$collaborator' WHERE tid='$tid' AND auth='$auth'";
	$result = $dbgo->prepare($sql); 
	echo $result->execute();
?>



