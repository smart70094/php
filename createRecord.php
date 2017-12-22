<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="record";
	$uid=$_POST['uid'];
	$tid=$_POST['tid'];
	$rid=$_POST['rid'];
	$record=$_POST['record'];
	$date=$_POST['date'];
	
	$sql ="INSERT INTO ".$table." (uid,tid,rid,record,date) VALUES ( '$uid','$tid','$rid','$record','$date')";  //新增資料
	echo $dbgo->exec($sql);
	 
?>