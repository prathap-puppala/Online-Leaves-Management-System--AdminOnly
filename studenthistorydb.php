<?php

session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
if(isset($_POST["stuid"]) && !empty($_POST["stuid"]))
{
$stuid=strip_tags(trim(htmlspecialchars(htmlentities($_POST["stuid"]))));
$stuid=strtoupper($stuid);
if(mysql_num_rows(mysql_query("SELECT * FROM student_details WHERE stuid='".mysql_real_escape_string($stuid)."'"))>=1)
{

$tyear="outing".$foryear;
$tyear1="leave".$foryear;
$stuoutingtab=mysql_fetch_array(mysql_query("SELECT * FROM $tyear WHERE stuid='".mysql_real_escape_string($stuid)."'"));
$stuleavetab=mysql_fetch_array(mysql_query("SELECT * FROM $tyear1 WHERE stuid='".mysql_real_escape_string($stuid)."'"));

$months=array("","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar","Apr","May","Jun","Jul");
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
<th colspan="4">N130950's PROFILE</th>
<tr><td colspan="4" class="subopt">OUTING HISTORY</td></tr>
<tr><td colspan="4" class="fild">
<table WIDTH="100%">
<tr style="background:#FFF0F5;">
<?php
for ($i=1;$i<count($months);$i++)
	{
	echo "<td  style='border:1px solid #eee;'>".$months[$i]."</td>";
}
		?>
		</tr>
			<tr style="background:#FFFFE0;">
<?php
for ($i=1;$i<count($months);$i++)
	{
		$mon='M'.$months[$i];
		?>
	<td  style='border:1px solid #eee;'><?php echo $stuoutingtab[$mon];?></td>
<?php
}
		?>
		</tr>

		</table>
</td></tr>
<tr><td class="fild">Sno</td><td class="fild" colspan="2">Student ID</td><td class="fild">Date</td></tr>
<?php
$det=mysql_query("SELECT * FROM mainoutings WHERE stuid='".$stuid."' ORDER BY sno DESC LIMIT 15");
while($d=mysql_fetch_array($det))
{
?>
<tr><td class="fildval"><?php echo $d['sno'];?></td><td class="fildval" colspan="2"><?php echo $d['stuid'];?></td><td class="fildval"><?php echo $d['date'];?></td></tr>
<?php } ?>
<tr><td colspan="4" class="subopt">LEAVE HISTORY</td></tr>
<tr><td colspan="4" class="fild">
<table WIDTH="100%">
<tr style="background:#FFF0F5;">
<?php
for ($i=1;$i<count($months);$i++)
	{
	echo "<td  style='border:1px solid #eee;'>".$months[$i]."</td>";
}
		?>
		</tr>
			<tr style="background:#FFFFE0;">
<?php
for ($i=1;$i<count($months);$i++)
	{
		$mon='M'.$months[$i];
		?>
	<td  style='border:1px solid #eee;'><?php echo $stuleavetab[$mon];?></td>
<?php
}
		?>
		</tr>

		</table>
</td></tr>
<tr><td class="fild">Sno</td><td class="fild" colspan="2">Student ID</td><td class="fild">Date</td></tr>
<?php
$det=mysql_query("SELECT * FROM mainleaves WHERE stuid='".$stuid."' ORDER BY sno DESC LIMIT 15");
while($d=mysql_fetch_array($det))
{
?>
<tr><td class="fildval"><?php echo $d['sno'];?></td><td class="fildval" colspan="2"><?php echo $d['stuid'];?></td><td class="fildval"><?php echo $d['date'];?></td></tr>
<?php } ?>

<table><tr><td colspan="4"> </td></tr></table>

						</table>
</center>
<?php	
	}
else{echo "<center><br><br><br><h4 style='color:red;'>Invalid Student ID</h4></center>";}

}

?>
