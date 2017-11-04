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
    $tid = $_GET['tid'];
	
    //找出全部任務
	$sth = $conn->prepare("SELECT count(*) FROM `mission` WHERE `tid` = ?");
	$sth->execute(array($tid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
		$row_array['all_mission'] = $row['count(*)'];
	}


    //找出完成的任務
    $sth = $conn->prepare("SELECT count(*) FROM `mission` WHERE `tid` = ? AND `state` = 'Y'");
	$sth->execute(array($tid));
	$result = $sth->fetchAll();

    foreach ($result as $row) {
        $row_array['complete_mission'] = $row['count(*)'];
        array_push($arr,$row_array);
        unset($row_array);
    }
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>