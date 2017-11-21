<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=teamgogoal", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
	$conn->exec("set names utf8");
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }
?>

    <?php
    $uid = $_GET['uid'];
	$tid = $_GET['tid'];
	

	$sth = $conn->prepare("SELECT DISTINCT message.originator,account.uid FROM `message`,`account` WHERE account.account = message.originator AND message.tid=? AND message.uid=?");
	$sth->execute(array($uid,$tid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
		$row_array['uid'] = $row['uid'];
		$row_array['originator'] = $row['originator'];
		array_push($arr,$row_array);
	}
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>