<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	$tid=$_POST['tid'];
	$account=$_POST['account'];
	
	$sql="SELECT uid FROM account WHERE account='$account'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	
	
	$sql="SELECT uid,a,b,c,d,e,f,g FROM element WHERE tid='$tid' AND uid='$uid'";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	
	$elements="";
	foreach ($result as $datainfo) {
		$elements=$datainfo['a'].",".$datainfo['b'].",".$datainfo['c'].",".$datainfo['d'].",".$datainfo['e'].",".$datainfo['f'].",".$datainfo['g'];
		
		break;
	}
	echo $elements;

?>