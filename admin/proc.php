<?php

if(isset($_POST['toggle'])){
	$ud=file_get_contents('db.json');
	$udarray = json_decode($ud,true);
	$narr=array();
	foreach($udarray as $key=>$value){$narr[$key]=$value;};
	if($narr['status'] == 'on'){
		$narr['status'] = 'off';}
	else{$narr['status'] = 'on';};
	file_put_contents('db.json',json_encode($narr));
	header('location:./?');};
		
if(isset($_POST['toggleloop'])){
		$ud=file_get_contents('db.json');
		$udarray = json_decode($ud,true);
		$narr=array();
		foreach($udarray as $key=>$value){$narr[$key]=$value;};
		if($narr['live'] == 'on'){
			$narr['live'] = 'off';}
		else{$narr['live'] = 'on';};
		file_put_contents('db.json',json_encode($narr));
		if($_POST['toggleloop']=='live'){header('location:live');}
		else{header('location:./?');};
		};
		
if(isset($_POST['clear'])){
	$narr=array('visits'=>array(),'bots'=>array(),'humans'=>array(),'clients'=>0,'o'=>array(),'status'=>'on','live'=>'on');
	file_put_contents('db.json',json_encode($narr));
	$larr=(object) array();
	file_put_contents('live.json',json_encode($larr));
	file_put_contents('bots.txt','');
	file_put_contents('results.txt','');
	file_put_contents('dirs.txt','');
	file_put_contents('yo.txt','');
	if(file_exists('fdir.json')){unlink('fdir.json');};
	header('location:./?');};
		
		
		
		
		
		
		?>