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
    $uid = $_GET['userID'];
	

	$sth = $conn->prepare("SELECT element.tid,element.planet,target.targetName FROM `element`,`target` WHERE planet IS NOT NULL AND uid=? AND element.tid = target.tid");
	$sth->execute(array($uid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
        if($row['tid'] != 0){
            $row_array['tid'] = $row['tid'];
            $row_array['targetName'] = $row['targetName'];
            $row_array['planet'] = $row['planet'];
            array_push($arr,$row_array);
        }
	}
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>