<?php
session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
if(isset($_GET["date"]) && !empty($_GET["date"]) && isset($_GET["mode"]) && !empty($_GET["mode"]))
{
$date=strip_tags(trim(htmlspecialchars(htmlentities($_GET["date"]))));
$mode=strip_tags(trim(htmlspecialchars(htmlentities($_GET["mode"]))));
$date=strtoupper($date);
if($mode=="outings")
{
$tyear1="mainoutings";
}
else
{
$tyear1="mainleaves";
}?>
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
<th colspan="4" class="subopt"><?php echo $date;?> <?php echo strtoupper($mode);?>  DATA</th>
<?php

if($mode=="outings")
{?>
<tr><td class="fild">Sno</td><td class="fild" colspan="2">Student ID</td><td class="fild">Date</td></tr>
<?php }
else
{
	?>
<tr><td class="fild">Sno</td><td class="fild">Student ID</td><td class="fild">Leaving Date</td><td class="fild">Reporting Date</td></tr>
	
<?php
}
$stuleavetab=mysql_query("SELECT * FROM $tyear1 WHERE date='".mysql_real_escape_string($date)."'");
$sno=0;
while($t=mysql_fetch_array($stuleavetab))
{
	$sno=$sno+1;
if($mode=="outings")
{
?>
	<tr><td class="fildval"><?php echo $sno;?></td><td class="fildval" colspan="2"><?php echo $t["stuid"];?></td><td class="fildval"><?php echo $t["date"];?></td></tr>

<?php
}
	else
	{?>
<tr><td class="fildval"><?php echo $sno;?></td><td class="fildval"><?php echo $t["stuid"];?></td><td class="fildval"><?php echo $t["date"];?></td><td class="fildval"><?php echo $t["todate"];?></td></tr>
<?php
}
}
?>
</table><br><br>
<center><a style="cursor:pointer;margin-left:5%;" onclick="window.print()"><button>Print</button></a></center>
<br><br>
</center>
<?php	

}

?>
