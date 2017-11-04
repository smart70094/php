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
	

	$sth = $conn->prepare("select DISTINCT target.tid,targetName,dream from record, target WHERE uid=?");
	$sth->execute(array($uid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
        if($row['tid'] != 0){
            $row_array['tid'] = $row['tid'];
            $row_array['targetName'] = $row['targetName'];
            $row_array['planet'] = $row['dream'];
            array_push($arr,$row_array);
        }
	}
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>