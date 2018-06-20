<?php
session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}?>
<link rel="stylesheet" type="text/css" href="css/buttons.css">
<center>
					<div id="mainview" style="width:900px;min-height:300px;margin-top:40px;background:#fff;border:1px ridge #eee;" class="search_form general_form">
					<div style="margin-left:40%;">
						<br><br>

							<a class="button blue big" target="_blank" href="excelmode.php">Download in Excel Format</a><br><br><br><br>
							<a class="button orange big" target="_blank" href="htmlmode.php?mode=pdf">Download in Pdf &nbsp;&nbsp; Format</a><br><br><br><br>
							<a class="button green big" target="_blank" href="htmlmode.php">Download in HTML Format</a>
					</div>
					</div>
</center>
