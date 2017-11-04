<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	$tid=$_POST['tid'];
	$uid=$_POST['uid'];
	$planet=$_POST['planet'];
	
	$sql ="UPDATE element SET planet='$planet' WHERE tid='$tid' AND uid='$uid'";
	echo $dbgo->exec($sql);
?>