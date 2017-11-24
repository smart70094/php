<?php 
$uid = $_GET["uid"];

copy("profilepicture/default.png" , "profilepicture/". $uid .".png");
?>