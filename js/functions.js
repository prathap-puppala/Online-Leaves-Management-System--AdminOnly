setInterval(function(){$("#stats").load("homestats.php")},5000);

/*
document.onkeydown = function (e) {
e = e || window.event;
if (e.keyCode === 13) {
mainoutfunc();
return false;
  }
		}
*/
function load_page(i)
{
	$("#main_menu ul li a").removeClass("selected");
	$("#"+i).addClass("selected");
	$("#content").html("<center><br><br><br><img src='img/loading45.gif'></center>").load(i+".php");
}

function dofoc()
{
$("#stuid").focus();	
}


function mainoutfunc()
{
var stuid=$("#stuid").val();
stuid=stuid.toUpperCase();
if(stuid.length!=7)
{
alert("Student ID should be 7 Letters");
dofoc();
return false;
}
else if(isNaN(stuid[0])==false || isNaN(stuid.substr(1,7))==true)
{
alert("Please Enter Valid Student ID");
dofoc();
return false;
}
else
{
var datastring="stuid="+stuid;
$.ajax({
type:"post",
url:"studettohome.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Fetching <b>"+stuid+"</b> Data...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}


function searchstufunc()
{
var stuid=$("#stuid").val();
stuid=stuid.toUpperCase();
if(stuid.length!=7)
{
alert("Student ID should be 7 Letters");
dofoc();
return false;
}
else if(isNaN(stuid[0])==false || isNaN(stuid.substr(1,7))==true)
{
alert("Please Enter Valid Student ID");
dofoc();
return false;
}
else
{
var datastring="stuid="+stuid;
$.ajax({
type:"post",
url:"searchstudb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Fetching <b>"+stuid+"</b> Data...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}


function stuhistory()
{
var stuid=$("#stuid").val();
stuid=stuid.toUpperCase();
if(stuid.length!=7)
{
alert("Student ID should be 7 Letters");
dofoc();
return false;
}
else if(isNaN(stuid[0])==false || isNaN(stuid.substr(1,7))==true)
{
alert("Please Enter Valid Student ID");
dofoc();
return false;
}
else
{
var datastring="stuid="+stuid;
$.ajax({
type:"post",
url:"studenthistorydb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Fetching <b>"+stuid+"</b> Data...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}


function leavesdata()
{
var stuid=$("#stuid").val();
if(stuid.length!=10)
{
alert("Date Should be 10 Characters Long");
dofoc();
return false;
}
else if(stuid[2]!="-" && stuid[5]!="-" && isNaN(stuid.substr(0,2))==true && isNaN(stuid.substr(3,5))==true && isNaN(stuid.substr(6,9))==true)
{
alert("Date should be in DD-MM-YYYY");
dofoc();
return false;
}
else
{
var datastring="date="+stuid;
$.ajax({
type:"post",
url:"leavesdatadb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Fetching Leave Data of <b>"+stuid+"</b>...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}


function outingsdata()
{
var stuid=$("#stuid").val();
if(stuid.length!=10)
{
alert("Date Should be 10 Characters Long");
dofoc();
return false;
}
else if(stuid[2]!="-" && stuid[5]!="-" && isNaN(stuid.substr(0,2))==true && isNaN(stuid.substr(3,5))==true && isNaN(stuid.substr(6,9))==true)
{
alert("Date should be in DD-MM-YYYY");
dofoc();
return false;
}
else
{
var datastring="date="+stuid;
$.ajax({
type:"post",
url:"outingsdatadb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Fetching Leave Data of <b>"+stuid+"</b>...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}


function insintodb(mode,stuid)
{
var check=0
var modeform="";
if(mode=="outings"){modeform="Outing form";}else if(mode=="leaves"){modeform="Leave form";}
if(mode=="outings" || mode=="leaves"){check=check+1;}
if(isNaN(stuid[0])==true || isNaN(stuid.substr(1,7))==false){check=check+1;}

if(check==2)
{
var datastring="mode="+mode+"&stuid="+stuid;
$.ajax({
type:"post",
url:"insertintodb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Opening <b>"+modeform+"</b> of <b>"+stuid+"</b>...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
else{alert("Something Wrong");}
}

function loginformvalid()
{
var userid=$("#userid").val();	
var passwd=$("#passwd").val();	

if(userid=="" && passwd==""){alert("All Fields are required");return false;}
else{return true;}
}


function insertintooutings(stuid)
{

stuid=stuid.toUpperCase();
if(stuid.length!=7)
{
alert("Student ID should be 7 Letters");
dofoc();
return false;
}
else if(isNaN(stuid[0])==false || isNaN(stuid.substr(1,7))==true)
{
alert("Please Enter Valid Student ID");
dofoc();
return false;
}
else
{
var datastring="mode=outings&stuid="+stuid;
$.ajax({
type:"post",
url:"insertintodbdb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Submitting <b>"+stuid+" Outing Form</b>...</center>");},
success:function(data){$("#mainview").html(data);}
});

}
}



function insertintoleaves(stuid)
{
stuid=stuid.toUpperCase();
leavingdate=$("#leavingdate").val();
reportingdate=$("#reportingdate").val();

if(stuid.length!=7)
{
alert("Student ID should be 7 Letters");
dofoc();
return false;
}
else if(isNaN(stuid[0])==false || isNaN(stuid.substr(1,7))==true)
{
alert("Please Enter Valid Student ID");
dofoc();
return false;
}
else if(leavingdate[2]!="-" && leavingdate[5]!="-" && isNaN(leavingdate.substr(0,2))==true && isNaN(leavingdate.substr(3,5))==true && isNaN(leavingdate.substr(6,9))==true)
{
alert("Leaving Date should be in DD-MM-YYYY");
dofoc();
return false;
}
else if(reportingdate[2]!="-" && reportingdate[5]!="-" && isNaN(reportingdate.substr(0,2))==true && isNaN(reportingdate.substr(3,5))==true && isNaN(reportingdate.substr(6,9))==true)
{
alert("Reporting Date should be in DD-MM-YYYY");
dofoc();
return false;
}



else
{
	var datastring="mode=leaves&stuid="+stuid+"&date="+leavingdate+"&todate="+reportingdate;
$.ajax({
type:"post",
url:"insertintodbdb.php",
data:datastring,
cache:false,
beforeSend:function(){$("#mainview").html("<center><br><br><br><img src='img/loading42.gif'><br>Submitting <b>"+stuid+" Leave Form</b>...</center>");},
success:function(data){$("#mainview").html(data);}
});
}
}
