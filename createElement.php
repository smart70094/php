<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="element";
	$tid=$_POST['tid'];
	$account=$_POST['account'];

	$sql="SELECT uid FROM account WHERE account='$account'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	
	$sql ="INSERT INTO ".$table." (tid,uid,a,b,c,d,e,f,g,incomplete,planet)  VALUES ( '$tid','$uid',0,0,0,0,0,0,0,0,NULL)";  //新增資料

	echo $dbgo->exec($sql);
    
	
	
?><?