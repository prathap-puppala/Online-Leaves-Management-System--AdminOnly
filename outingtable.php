<?php
require_once("connect.php");
$year=date("Y");
$tyear="outing".$foryear;
$months=array("","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar","Apr","May","Jun","Jul");
$script="CREATE TABLE IF NOT EXISTS $tyear 
	(stuid varchar(50),
	PRIMARY KEY(stuid),";
	for ($i=1;$i<count($months);$i++)
	{
	$script=$script."M".$months[$i]." int(4)  DEFAULT 0,\n";
	}
	$script=$script."total int(5) DEFAULT 0)";
    $rest=mysql_query($script);
	if (!$rest)
		{
		echo "Error Occured on Creating Table :: ".$tyear."<br>Error is ".mysqL_error();
		}
	

	 ?>
