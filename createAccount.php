<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	
	
	$account=$_POST['account'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$role="user";
	$email=$_POST['email'];
	
	$sql="SELECT MAX(uid) FROM account";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$uid= $result->fetchColumn(); 
	$uid=$uid+1;
	
	$sql ="INSERT INTO account (uid,account,password,name,role,email) VALUES ( '$uid','$account','$password','$name','$role', '$email')";
	$result=$dbgo->prepare($sql);	
	$result->execute();
	echo $uid;
?>