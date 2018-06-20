<?php
//echo date("m");
date_default_timezone_set("Asia/Calcutta");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y, %B %d, %A."))." ".date("h:i:sa");
$ip=$_SERVER['REMOTE_ADDR'];
$today=date("d-m-Y");
//database variables
$database_name="leave_data";
$foryear="2015";

//database connection
mysql_connect("localhost","root","sf1prathap") or die(mysql_error());
mysql_select_db($database_name) or die(mysql_error());

?>
