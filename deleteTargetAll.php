<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$tid=$_POST['tid'];
	
	$sql ="DELETE FROM "."element"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute();
	
	$sql ="DELETE FROM "."participator"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 
	
	$sql ="DELETE FROM "."mission"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 

    $sql ="DELETE FROM "."record"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();

    $sql ="DELETE FROM "."message"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();

    $sql ="DELETE FROM "."registerrequest"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
    echo $result->execute();
    
	$sql ="DELETE FROM "."target"." WHERE '$tid'=tid";
	$result = $dbgo->prepare($sql); 
	echo $result->execute(); 
	
	
	
	
?>