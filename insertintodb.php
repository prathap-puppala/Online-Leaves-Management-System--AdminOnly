<?php
session_start();
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
if(isset($_POST["stuid"]) && !empty($_POST["stuid"]) && isset($_POST["mode"]) && !empty($_POST["mode"]))
{
$stuid=strip_tags(trim(htmlspecialchars(htmlentities($_POST["stuid"]))));
$mode=strip_tags(trim(htmlspecialchars(htmlentities($_POST["mode"]))));
$stuid=strtoupper($stuid);
if(mysql_num_rows(mysql_query("SELECT * FROM student_details WHERE stuid='".mysql_real_escape_string($stuid)."'"))>=1)
{
$modes=array("outings","leaves");
$modeform="";
if($mode=="outings"){$modeform="Outing form";}else if($mode=="leaves"){$modeform="Leave form";}
if($mode=="outings"){$link="insertintooutings('$stuid')";}else if($mode=="leaves"){$link="insertintoleaves('$stuid')";}

if(in_array($mode,$modes))
{

$userdet=mysql_query("SELECT * FROM student_details WHERE stuid='".mysql_real_escape_string($stuid)."'");
$u=mysql_fetch_array($userdet);
?>
<link rel="stylesheet" type="text/css" href="css/buttons.css">
<center>
<!--[if !IE]>start section<![endif]-->
					<div class="section">
						
						
						
						<!--[if !IE]>start section inner <![endif]-->
						<div class="section_inner">
						
						<!--[if !IE]>start forms<![endif]-->
						<form action="#" class="search_form general_form">
							<!--[if !IE]>start fieldset<![endif]-->
							<fieldset>
								<!--[if !IE]>start forms<![endif]-->
								<div class="forms">
								<h3><?php echo $modeform." for ".$stuid; ?></h3>
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>Student ID :</label>
									<div class="inputs">
										<span class="input_wrapper"><input class="text" id="stuid" type="text" value="<?php echo $stuid;?>" readonly disabled"/></span>
										<span id="stuiderror"></span>
									</div>
								</div>
								<!--[if !IE]>end row<![endif]-->
								
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>Student Name </label>
									<div class="inputs">
									<span class="input_wrapper"><input class="text" id="stuname" type="text" value="<?php echo $u['name'];?>" readonly disabled"/></span>
										<span id="stunameerror"></span>
									</div>
								</div>
								<!--[if !IE]>end row<![endif]-->
								<!--[if !IE]>start row<![endif]-->
									<?php if($mode=="outings"){?>
										<?php } else {?>
								<div class="row">
									<label>Dates:</label>
									<div class="inputs">
										<ul>
											<li><span class="input_wrapper medium_input"><input class="text" value="<?php echo date("d-m-Y");?>" type="text" id="leavingdate"/></span></li>
											<li>to</li>
											<li><span class="input_wrapper medium_input"><input class="text" value="<?php echo date("d-m-Y");?>" type="text" id="reportingdate"/></span> </li>
											

										</ul><br>
									
										<span class="system negative">Dates should be in DD-MM-YYYY only</span>
									</div>
								</div><?php } ?>
								<!--[if !IE]>end row<![endif]--><br><br><br>
								<div class="row"><div class="label"><a onclick="<?php echo $link;?>" style="cursor:pointer;" class="TopButtons">Submit</a></div>
								</div>
								</div>
								<!--[if !IE]>end forms<![endif]-->
								
								
								
								
								
								
							</fieldset>
							<!--[if !IE]>end fieldset<![endif]-->
							
							
							
							
						</form>
						<!--[if !IE]>end forms<![endif]-->
						<?php
						if($mode=="leaves"){?>
						<center><a onclick="insintodb('outings','<?php echo $stuid;?>')" style="cursor:pointer;color:green;font-weight:bold;"> --> Click here to switch to Outing Form --></a></center>
						<?php } else { ?>
						<br><br><br>
					    <center><a onclick="insintodb('leaves','<?php echo $stuid;?>')" style="cursor:pointer;color:green;font-weight:bold;"> --> Click here to switch to Leave Form --></a></center>
					    
					    <?php } ?>
					</div>
					<!--[if !IE]>end section inner<![endif]-->
					
					
					</div>
					<!--[if !IE]>end section<![endif]-->
					</center>
<?php
}
else{echo "<center><br><br><br><h4 style='color:red;'>There is some error in <big>TYPE OF MODE</big></h4></center>";}	
	}
else{echo "<center><br><br><br><h4 style='color:red;'>Invalid Student ID</h4></center>";}

}

?>
