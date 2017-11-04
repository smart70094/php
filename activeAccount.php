<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');;
		
	$table="account";
	$uid=$_GET['uid'];
	$uid=remove_utf8_bom($uid);
	$state="Y";
	

	$sql="UPDATE ".$table." SET state='$state' WHERE uid='$uid'";
	echo $sql;
	echo $dbgo->exec($sql);
	
	
	
	
	function remove_utf8_bom($text){
		$bom = pack('H*','EFBBBF');
		$text = preg_replace("/^$bom/", '', $text);
		return $text;
	}
?>



