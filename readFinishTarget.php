<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_select = "teamgogoal";
	$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select;
	$dbgo = new PDO($dbconnect, $db_user, $db_pass);
	$dbgo->query('set character set utf8');
	
	$sql="SELECT DISTINCT tid FROM element WHERE planet is NULL ";
	$getNoPlanet=$dbgo->prepare($sql);
	$getNoPlanet->execute();
	
	$result="";
	foreach ($getNoPlanet as $datainfo) {
		$tid=$datainfo['tid'];
		
		$sql = "SELECT tid,targetEndTime FROM target WHERE tid='$tid'" ;
		$getUser=$dbgo->prepare($sql);
		$getUser->execute();
		$today = getToday();
		$todayFormat=strtotime($today);
		foreach ($getUser as $datainfo2) {
			$tid2=$datainfo2['tid'];
			$endTime=$datainfo2['targetEndTime'];
			
			$endTimeFormat=strtotime($endTime);
			if($todayFormat>$endTimeFormat){
				$result=$result.",".$tid2;
			}
		}
		
	}
	echo $result;
	
	
   
	
	
	
	
	
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