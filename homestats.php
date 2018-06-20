<?php
session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
$today=date("d-m-Y");
$tyear="outing".$foryear;
$tyear1="leave".$foryear;
$tyeartab=mysql_query("SELECT * FROM  $tyear");
$tyear1tab=mysql_query("SELECT * FROM  $tyear1");
$outing=0;
$leave=0;
while($t=mysql_fetch_array($tyeartab)){$outing=$outing+$t["total"];}
while($t=mysql_fetch_array($tyear1tab)){$leave=$leave+$t["total"];}
$todayoutboy=0;
$todayoutgirl=0;
$todayoutbo=mysql_query("SELECT * FROM mainoutings WHERE date='$today'");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT gender FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det["gender"]=="M"){$todayoutboy=$todayoutboy+1;}
	else if($det["gender"]=="F"){$todayoutgirl=$todayoutgirl+1;}
}


$todayleavboy=0;
$todayleavgirl=0;
$todayoutbo=mysql_query("SELECT * FROM mainleaves WHERE date='$today'");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT * FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det["gender"]=="M"){$todayleavboy=$todayleavboy+1;}
	else if($det["gender"]=="F"){$todayleavgirl=$todayleavgirl+1;}
	}

$todayout=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mainoutings WHERE date='$today'"));
$todayleav=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mainleaves WHERE date='$today'"));

?>

					  <center>
						<table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="190px">
						<tr><th colspan="2" style='background:#EEE8AA;color:maroon;font-size:15px;'><?php echo date("d/m/Y");?> OUTINGS</th></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayout[0];?></td></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayoutboy;?></td></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>GIRLS</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayoutgirl;?></td></tr>
						</table>
						<br><br>
						
						<table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="190px">
						<tr><th colspan="2" style='background:#E6E6FA;color:maroon;font-size:15px;'><?php echo date("d/m/Y");?> LEAVES</th></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayleav[0];?></td></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayleavboy;?></td></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>GIRLS</td><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $todayleavgirl;?></td></tr>
						</table>
					   <br><br>
					   <table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="190px">
						<tr><th style='background:#F0F8FF;color:maroon;font-size:15px;'>TOTAL OUTINGS</th></tr>
						<tr><td  style='border:1px solid #eee;background:#FFFACD;'><?php echo $outing;?></td></tr>
						</table>
					   <br><br>
					   <table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="190px">
						<tr><th style='background:#B0E0E6;color:maroon;font-size:15px;'>TOTAL LEAVES</th></tr>
						<tr><td  style='border:1px solid #eee;background:#FFFFE0;'><?php echo $leave;?></td></tr>
						</table>
						
						</center>
