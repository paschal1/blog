<?php 
ob_start();
session_start();
$today = date("d/m/Y");
// echo $today;
// echo date("D-d-M");
// echo date("M,d,Y h:i:s A") . "\n";
date_default_timezone_set("Africa/Lagos");
$date_added = (date("F d, Y h:i A", time()));
//  echo "<b>$date_added</b>";
date_default_timezone_set("Africa/Lagos");
$connection = new mysqli("localhost","root","","admin") or die(mysqli_connect_error($connection));