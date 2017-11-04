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
	$mid = $_GET['mid'];
    //將任務狀態變更為完成
	$sth = $conn->prepare("UPDATE mission SET state='Y' WHERE mid=?;");
    $sth->execute(array($mid));

    //自我碎片增加1
    $tid = $_GET['tid'];
    $uid = $_GET['uid'];
    $sth = $conn->prepare("UPDATE element SET f = f + 1 WHERE tid=? AND uid=?;");
    $sth->execute(array($tid,$uid));

    //共通碎片增加1
    $sth = $conn->prepare("UPDATE element SET g = g + 1 WHERE tid=?;");
    $sth->execute(array($tid));

    //增加夥伴碎片
    $partnerid = $_GET['partnerid'];
	$sth = $conn->prepare("SELECT uid FROM account WHERE account=?");
	$sth->execute(array($partnerid));
	$result = $sth->fetchAll();
	$pid = 0;
	foreach ($result as $row) {
		$pid = $row['uid'];
	}
	
	$randomNumber =  rand ( 0 , 4 );
    $addelement = chr(97 + $randomNumber);

    $sth = $conn->prepare("UPDATE element SET `$addelement` = `$addelement` + 1 WHERE tid=? AND uid=?;");
    $sth->execute(array($tid,$pid));
?>














