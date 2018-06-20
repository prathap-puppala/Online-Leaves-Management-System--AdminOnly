<?php
session_start();
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="programmer" content="Prathap Puppala,N130950">
<title>RGUKT NUZVID LEAVES DATA - Login</title>
<link rel="stylesheet" type="text/css" href="css/meta-admin.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<link rel="icon" href="img/rgukt1.png">
</head>

<body onload="dofoc()">
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		<!--[if !IE]>start head<![endif]-->
		<div id="head">
			<div class="inner">
				<img src="img/rgukt1.png" width="100" height="100" style="margin-left:0px;margin-top:5px;float:left;"><h1 id="logo">Rajiv Gandhi University of Knowledge Technologies,Nuzvid<br><span style='font-size:15px;'>LEAVE PORTAL</span></h1>
			
				<!--[if !IE]>start main menu<![endif]-->
				<div id="main_menu">
					<ul>
						<li>
							<a id="home" href=""  class="selected"><span><span>Home</span></span></a>
							
						</li>
						<li>
							<a id="searchstu" href="javascript:load_page('searchstu');" style='cursor:pointer;'><span><span>Search Student</span></span></a>
							
						</li>
						<li>
							<a id="statistics" href="javascript:load_page('statistics');" style='cursor:pointer;'><span><span>Statistics</span></span></a>
							
						</li>
						<li><a id="studenthistory" href="javascript:load_page('studenthistory');" style='cursor:pointer;'><span><span>Student History (Leave/Outing) </span></span></a></li>
						<li><a id="todayreports" href="javascript:load_page('todayreports');" style='cursor:pointer;'><span><span>Today's Report</span></span></a></li>
						<li><a id="leavesdata" href="javascript:load_page('leavesdata');" style='cursor:pointer;'><span><span>Leaves Data</span></span></a></li>
						<li><a id="outingsdata" href="javascript:load_page('outingsdata');" style='cursor:pointer;'><span><span>Outings Data</span></span></a></li>
						<li><a  href="logout.php" style='cursor:pointer;'><span><span>Logout</span></span></a></li>
					    
					</ul>
				</div>
				<!--[if !IE]>end main menu<![endif]-->
				
			</div>
		</div>
		<!--[if !IE]>end head<![endif]-->
		<!--[if !IE]>start content<![endif]-->
		<div id="content">
			
			
					  <div id="stats" style="float:right;margin-top:10px;margin-right:40px;">
					  <script>setTimeout(function(){$("#stats").html("<br><br><br><br><br><b><img src='img/loading8.gif'>").load("homestats.php");});</script>
					  </div>
					
					
			<!--[if !IE]>start content bottom<![endif]-->
			<div id="content_bottom">
			
			<div class="inner">
				
				<!--[if !IE]>start info<![endif]-->
				<div id="info">
					
					
					
					
					
					
					<!--[if !IE]>start section<![endif]-->
					<div class="section">
						
						
						
						<!--[if !IE]>start section inner <![endif]-->
						<div class="section_inner">
					 
					  	
						<!--[if !IE]>start forms<![endif]-->
						<form style="width:900px;" onsubmit="mainoutfunc();return false;" class="search_form general_form">
							<!--[if !IE]>start fieldset<![endif]-->
							<fieldset>
								<!--[if !IE]>start forms<![endif]-->
								<div class="forms">
								<!--[if !IE]>start row<![endif]-->
								<div class="row" >
									<center>
									<label style="text-align:right;margin-left:150px;width:auto;">Enter Student ID Number:</label>
									<div class="inputs">
										<span class="input_wrapper"><input class="text"  name="stuid" id="stuid" placeholder="Student ID" type="text" maxlength="7" /></span>	<span class="button blue_button search_button"><span style="cursor:pointer;" onclick="mainoutfunc()"><span><em><span class="button_ico"></span>Search</em></span></span></span>
									
									</div>
									</center>
								</div>
								<!--[if !IE]>end row<![endif]-->
								
								
								
								</div>
							</fieldset>
							
							
						</form>
						
					<div style="background-image:url('img/Logobg.jpg');width:1000px;overflow:scroll;height:300px;margin-top:40px;background:#fff;border:1px solid #000;" class="search_form general_form">
					<div  id="mainview"  style="background:url('img/Logobg.jpg') no-repeat center;height:auto">
						<center><br><br><h3>Student Details Will be displayed here...</h3><br><br><br><br><br><br></center>
						
						</div>
					</div>
					
					</div>
					</div>
					<!--[if !IE]>end section<![endif]-->
					
					
					
					
					
				
				
			</div>
			<!--[if !IE]>end content bottom<![endif]-->
			</div>
			
		</div>
		<!--[if !IE]>end content<![endif]-->
	</div>
	<!--[if !IE]>end wrapper<![endif]-->
	
	<center><br><br><br>All Rights Reserved @ PRO,IIIT NUZVID</center>
</body>
</html>
