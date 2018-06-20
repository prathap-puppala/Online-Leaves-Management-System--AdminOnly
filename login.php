<?php
session_start();
require_once("connect.php");
if(isset($_SESSSION["siteuser"]) && !empty($_SESSION["siteuser"]))
{
header("location:index.php");
}
else
{
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST["submit"]))
{
$userid=strip_tags(trim(htmlentities($_POST["userid"])));
$passwd=strip_tags(trim($_POST["passwd"]));

if($userid!="" && $passwd!="")
{
$log=mysql_query("SELECT * FROM admin where userid='".mysql_real_escape_string($userid)."' && passwd='".mysql_real_escape_string($passwd)."'");
if(mysql_num_rows($log)>=1)
{
$_SESSION["siteuser"]=$userid;
header("location:index.php");
}
else{echo "<script>alert('Invalid Credentials');</script>";}
}
else{echo "<script>alert('All Fields are required');</script>";}
}
}

}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RGUKT NUZVID LEAVES DATA - Login</title>
<link rel="stylesheet" type="text/css" href="css/meta-admin-login.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="inner">
				<img src="img/rgukt1.png" width="100" height="100" style="margin-left:-90px;margin-top:5px;float:left;"><h1 id="logo">Rajiv Gandhi University of Knowledge Technologies,Nuzvid<br><span style='font-size:15px;'>LEAVE PORTAL</span></h1>
			</div>
		</div>
		<div id="content">
			
				<div id="login_wrapper">
					<span class="extra1"></span>
					<div class="title_wrapper">
						<h2>Please Login</h2>
						<a href="#">Lost password</a>
					</div>
					<form action="" method="post" onsubmit="return loginformvalid()">
						<fieldset>
							<!--[if !IE]>start row<![endif]-->
							<div class="row">
								<label>Username:</label>
								<span class="input_wrapper">
									<input class="text" name="userid" id="userid" type="text" />
								</span>
							</div>
							<div class="row">
								<label>Password:</label>
								<span class="input_wrapper">
									<input class="text" name="passwd" id="passwd" type="password" />
								</span>
							</div>
								<div class="row">
									<div class="inputs small_inputs">
										<span class="button blue_button unlock_button"><span><span><em><span class="button_ico"></span>Login</em></span></span><input name="submit" type="submit" /></span>
									</div>
								</div>
								<!--[if !IE]>end row<![endif]-->
						</fieldset>
					</form>
				</div>
		</div>
	</div>
</body>
</html>
