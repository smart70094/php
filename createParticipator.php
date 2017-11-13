<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	$table="participator";
	$tid=$_POST['tid'];
	$account=$_POST['account'];
	
	$sql="SELECT uid FROM account WHERE account='$account'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	
	
	$sql ="INSERT INTO ".$table." (tid,uid)  VALUES ( '$tid','$uid')";
	echo $dbgo->exec($sql);
?>