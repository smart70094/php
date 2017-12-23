<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$table="record";
	
	$uid=$_POST['uid'];
	$tid=$_POST['tid'];
	$record=$_POST['record'];
	
	$date=getToday();
	$sql="SELECT rid+1 FROM record ORDER BY rid DESC LIMIT 1 ";
	$result = $dbgo->prepare($sql); 
	$result->execute(); 
	$rid= $result->fetchColumn(); 
	
	
	
	$sql ="INSERT INTO ".$table." (uid,tid,rid,record,date) VALUES ( '$uid','$tid','$rid','$record','$date')";  //新增資料
	echo $dbgo->exec($sql);
	
	function getToday(){
		$today = getdate();
		date("Y/m/d H:i");  //日期格式化
		$year=$today["year"]; //年 
		$month=$today["mon"]; //月
		$day=$today["mday"];  //日

		if(strlen($month)=='1')$month='0'.$month;
		if(strlen($day)=='1')$day='0'.$day;
		$today=$year."-".$month."-".$day;
		//echo "今天日期 : ".$today;

		return $today;
	}
	 
?>