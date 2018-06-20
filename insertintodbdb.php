<?php
session_start();
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}

$today=date("d-m-Y");
$tmonth="M".date("M");
if(isset($_POST["stuid"]) && !empty($_POST["stuid"]) && isset($_POST["mode"]) && !empty($_POST["mode"]))
{
$stuid=strip_tags(trim(htmlspecialchars(htmlentities($_POST["stuid"]))));
$mode=strip_tags(trim(htmlspecialchars(htmlentities($_POST["mode"]))));

if($mode=="leaves"){$date=strip_tags(trim(htmlspecialchars(htmlentities($_POST["date"]))));$todate=strip_tags(trim(htmlspecialchars(htmlentities($_POST["todate"]))));}
$stuid=strtoupper($stuid);
if(mysql_num_rows(mysql_query("SELECT * FROM student_details WHERE stuid='".mysql_real_escape_string($stuid)."'"))>=1)
{
$modes=array("outings","leaves");
$modeform="";
if(in_array($mode,$modes))
{
$tyear="outing".$foryear;
$tyear1="leave".$foryear;

if($mode=="outings"){
mysql_query("INSERT INTO mainoutings(stuid,date) VALUES('$stuid','$today')");
mysql_query("UPDATE $tyear SET $tmonth=$tmonth+1,total=total+1 WHERE stuid='$stuid'");
echo "<center><br><br><h3>Outing Details of $stuid Inserted Successfully...</h3><br><br><br><br><br><br></center>";
}
else if($mode=="leaves"){
mysql_query("INSERT INTO mainleaves(stuid,date,todate) VALUES('$stuid','$date','$todate')");
mysql_query("UPDATE $tyear1 SET $tmonth=$tmonth+1,total=total+1 WHERE stuid='$stuid'");
echo "<center><br><br><h3>Leave Details of $stuid Inserted Successfully...</h3><br><br><br><br><br><br></center>";
}

}

else{echo "<center><br><br><br><h4 style='color:red;'>There is some error in <big>TYPE OF MODE</big></h4></center>";}	
	
	}

else{echo "<center><br><br><br><h4 style='color:red;'>Invalid Student ID</h4></center>";}

}

?>
