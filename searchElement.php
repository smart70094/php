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
	$uid = $_GET['uid'];
	

	$sth = $conn->prepare("select * from element WHERE uid=? AND tid=?");
	$sth->execute(array($uid,$tid));
	$result = $sth->fetchAll();
	
	$arr = array();
	foreach ($result as $row) {
        $row_array['mine'] = $row['a'];
        $row_array['mountain'] = $row['b'];
        $row_array['snow'] = $row['c'];
		$row_array['fire'] = $row['d'];
		$row_array['soil'] = $row['e'];
		array_push($arr,$row_array);
	}
	
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
?>