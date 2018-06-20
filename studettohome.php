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
$userdet=mysql_query("SELECT * FROM student_details WHERE stuid='".mysql_real_escape_string($stuid)."'");
$u=mysql_fetch_array($userdet);
$tyear="outing".$foryear;
$tyear1="leave".$foryear;
$tyeartab=mysql_query("SELECT * FROM $tyear WHERE stuid='".mysql_real_escape_string($stuid)."'");
$tyear1tab=mysql_query("SELECT * FROM $tyear1 WHERE stuid='".mysql_real_escape_string($stuid)."'");
if(!mysql_fetch_array($tyeartab)){require_once("outingtable.php");mysql_query("INSERT INTO $tyear(stuid) VALUES ('$stuid')");}
if(!mysql_fetch_array($tyear1tab)){require_once("leavetable.php");mysql_query("INSERT INTO $tyear(stuid) VALUES ('$stuid')");}

$stuoutingtab=mysql_fetch_array(mysql_query("SELECT * FROM $tyear WHERE stuid='".mysql_real_escape_string($stuid)."'"));
$stuleavetab=mysql_fetch_array(mysql_query("SELECT * FROM $tyear1 WHERE stuid='".mysql_real_escape_string($stuid)."'"));

$months=array("","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar","Apr","May","Jun","Jul");
?>
<link rel="stylesheet" type="text/css" href="css/buttons.css" />
<style>
table{margin:0px;border:1px solid #ddd;text-align:center;} 
table th{background:#006666;color:#fff;}
table tr{background:#eee;border:0px;}
table tr td.fild{background:#FFF0F5;}
table tr td.fildval{background:#FFFFE0;}
table tr td.subopt{font-weight:bold;background:#B0E0E6;color:#ee6666;}
</style>
<center>
<table width="98%" style="margin-top:-13px;margin-left:-32px;">
<th colspan="4">N130950's PROFILE</th>
<tr><td rowspan="5" width="200px"><img src="stupics/<?php echo $stuid.".jpg";?>" width="200px" height="170px"></td>
<td class="fild">Student ID</td><td class="fild">:</td><td class="fild"><?php echo $stuid;?></td></tr>
<tr><td class="fildval">Student Name</td><td class="fildval">:</td><td class="fildval"><?php echo $u['name'];?></td></tr>
<tr><td class="fild">Gender</td><td class="fild">:</td><td class="fild"><?php echo $u['gender'];?></td></tr>
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


<tr><td rowspan="3" style="text-align:center;">
<a onclick="insintodb('outings','<?php echo $stuid;?>')" style="cursor:pointer;" class="TopButtons" style="color:#fff;">Outing --></a>
<a onclick="insintodb('leaves','<?php echo $stuid;?>')" style="cursor:pointer;" class="TopButtons" style="color:#fff;backgound:red;">Leave --></a>
</td><td colspan="3" class="subopt">LEAVE HISTORY</td></tr>
<tr><td colspan="3" class="fild">
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
						</table>
</center>
<?php	
	}
	
else{
	echo "<center><br><br><br><h4 style='color:red;'>Invalid Student ID</h4></center>";}

}

?>
