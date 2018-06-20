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
$todayleavboy=0;
$todayleavgirl=0;
$todayoutbo=mysql_query("SELECT * FROM mainoutings WHERE date='$today'");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT gender FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det[0]=="M"){$todayoutboy=$todayoutboy+1;}
	else if($det[0]=="F"){$todayoutgirl=$todayoutgirl+1;}
}

$totalboyout=0;
$totalgirlout=0;
$totalboyleav=0;
$totalgirlleav=0;
$todayoutbo=mysql_query("SELECT * FROM mainoutings");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT gender FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det[0]=="M"){$totalboyout=$totalboyout+1;}
	else if($det[0]=="F"){$totalgirlout=$totalgirlout+1;}
}
$totalout=mysql_num_rows($todayoutbo);


$todayoutbo=mysql_query("SELECT * FROM mainleaves");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT gender FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det[0]=="M"){$totalboyleav=$totalboyleav+1;}
	else if($det[0]=="F"){$totalgirlleav=$totalgirlleav+1;}
}
$totalleav=mysql_num_rows($todayoutbo);


$leavgirl=0;
$leavboy=0;
$todayoutbo=mysql_query("SELECT * FROM mainleaves WHERE date='$today'");
while($t=mysql_fetch_array($todayoutbo))
{
	$det=mysql_fetch_array(mysql_query("SELECT gender FROM student_details WHERE stuid='".$t['stuid']."'"));
	if($det[0]=="M"){$leavboy=$leavboy+1;}
	else if($det[0]=="F"){$leavgirl=$leavgirl+1;}
	}

$todayout=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mainoutings WHERE date='$today'"));
$todayleav=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mainleaves WHERE date='$today'"));

?><center>
					<div id="mainview" style="width:900px;min-height:300px;margin-top:40px;background:#fff;border:1px ridge #eee;" class="search_form general_form">
					<div>
						<center>
						<table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="96%">
						<tr><th colspan="6" style='background:#E6E6FA;color:maroon;'>OUTINGS STATISTICS</th></tr>
						<tr><th colspan="3" style='background:#EEE8AA;'><?php echo date("d/m/Y");?></th><th colspan="3" style='background:#EEE8AA;'>Total</th></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;'>GIRLS</td><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;'>GIRLS</td></tr>
						<tr style="background:#FFFFE0;"><td  style='border:1px solid #eee;'><?php echo $todayout[0];?></td><td  style='border:1px solid #eee;'><?php echo $todayoutboy;?></td><td  style='border:1px solid #eee;'><?php echo $todayoutgirl;?></td><td  style='border:1px solid #eee;'><?php echo $totalout;?></td><td  style='border:1px solid #eee;'><?php echo $totalboyout;?></td><td  style='border:1px solid #eee;'><?php $totalgirlout;?></td></tr>
						</table>
						<br><br>
						
						<table  cellpadding="3" style="font-family:Times New Roman;border:1px solid black;text-align:center;" width="96%">
						<tr><th colspan="6" style='background:#E6E6FA;color:maroon;'>LEAVES STATISTICS</th></tr>
						<tr><th colspan="3" style='background:#EEE8AA;'><?php echo date("d/m/Y");?></th><th colspan="3" style='background:#EEE8AA;'>Total</th></tr>
						<tr style="background:#FFF0F5;"><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;'>GIRLS</td><td  style='border:1px solid #eee;'>TOTAL</td><td  style='border:1px solid #eee;'>BOYS</td><td  style='border:1px solid #eee;'>GIRLS</td></tr>
						<tr style="background:#FFFFE0;"><td  style='border:1px solid #eee;'><?php echo $todayleav[0];?></td><td  style='border:1px solid #eee;'><?php echo $leavboy;?></td><td  style='border:1px solid #eee;'><?php echo $leavgirl;?></td><td  style='border:1px solid #eee;'><?php echo $totalleav;?></td><td  style='border:1px solid #eee;'><?php echo $totalboyleav;?></td><td  style='border:1px solid #eee;'><?php echo $totalgirlleav;?></td></tr>
						</table>
						</center>
					</div>
					</div>
</center>
