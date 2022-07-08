<?php if (isset($_GET['id'])) {
	$id=$_GET['id'];
	if (date('m')>01){
		$a=date('Y');
		$d=$a+1;
		$c=$a.'-'.$d;
	}
	else{
		$b=date('Y');
		$a=$b-1;
		$c=$a.'-'.$b;
		}
	} 
?>