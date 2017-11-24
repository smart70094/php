<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	$tid=$_POST['tid'];
	
	$sql ="SELECT count(tid) FROM participator WHERE tid='$tid'";
	$result=$dbgo->prepare($sql);
	$result->execute();
	$count=$result->fetchColumn(); 
	echo $count;

?>