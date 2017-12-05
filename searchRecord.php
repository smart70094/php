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
	

	$sth = $conn->prepare("select * from record WHERE uid=? AND tid=?");
	$sth->execute(array($uid,$tid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
		$row_array['rid'] = $row['rid'];
		$row_array['record'] = $row['record'];
		array_push($arr,$row_array);
	}
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>