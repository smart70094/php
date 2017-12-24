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
	
	
	$sql ="DELETE FROM "."participator"." WHERE '$tid'=tid AND '$uid'=uid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();
    
	
	$sql ="DELETE FROM "."element"." WHERE '$tid'=tid AND '$uid'=uid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();
	
	$sql ="DELETE FROM "."record"." WHERE '$tid'=tid AND '$uid'=uid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();
	
	$sql ="DELETE FROM "."mission"." WHERE '$tid'=tid AND auth='$account'";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();

?>