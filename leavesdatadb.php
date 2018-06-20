<?php
session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
if(isset($_POST["date"]) && !empty($_POST["date"]))
{
$date=strip_tags(trim(htmlspecialchars(htmlentities($_POST["date"]))));
$date=strtoupper($date);
$today=date("d-m-Y");
$tyear1="mainleaves";
$stuleavetab=mysql_fetch_array(mysql_query("SELECT * FROM $tyear1 WHERE date='".mysql_real_escape_string($today)."'"));
?>
<link rel="stylesheet" type="text/css" href="css/buttons.css" />
<style>
table{border:1px solid #ddd;text-align:center;} 
table th{background:#006666;color:#fff;}
table tr{background:#eee;border:0px;}
table tr td.fild{background:#FFF0F5;}
table tr td.fildval{background:#FFFFE0;}
table tr td.subopt{font-weight:bold;background:#B0E0E6;color:#ee6666;}
</style>
<center>
<table width="100%">
<th colspan="4" class="subopt"><?php echo $date;?> LEAVE's DATA</th>
<tr><td class="fild">Sno</td><td class="fild">Student ID</td><td class="fild">Leaving Time</td><td class="fild">Reporting Time</td></tr>
<?php

$stuleavetab=mysql_query("SELECT * FROM $tyear1 WHERE date='".mysql_real_escape_string($today)."'");
$sno=0;
while($t=mysql_fetch_array($stuleavetab))
{
	$sno=$sno+1;
?>
<tr><td class="fildval"><?php echo $sno;?></td><td class="fildval"><?php echo $t["stuid"];?></td><td class="fildval"><?php echo $t["date"];?></td><td class="fildval"><?php echo $t["todate"];?></td></tr>
<?php
}
?>
</table><br><br>
<center><a style="cursor:pointer;margin-left:5%;" target="_blank" href="printout.php?mode=leaves&date=<?php echo $date;?>" class="TopButtons">Print</a></center>
<br><br>
</center>
<?php	

}

?>
