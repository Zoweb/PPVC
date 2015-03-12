<?php
$cff="counter/readme.config";
if (file_get_contents($cff) === "This file is here so that the code knows that this folder is here. Please do not delete it, otherwise count numbers may be reset. Please also do not edit it, as this may also make the numbers require a reset. This counter was created by Zoweb, in 2015. Find his website at www.zoweb.me.") {
	$newconta=$_SERVER['REMOTE_ADDR'];$filea="counter/".$newconta.".txt";
	if ($filea=="counter/::1.txt") {
		$filea="counter/.webhost.txt";
	}
	$file="counter/number.txt";$prevcont=file_get_contents($file);
	if (!file_exists($filea)) {
		file_put_contents($filea,$newconta);$newcont=$prevcont+1;file_put_contents($file,$newcont);echo "This page has been now been visited ".$newcont." time(s)";echo ". Your IP (".$_SERVER['REMOTE_ADDR'].") has not yet visited this site, so has been counted on our counter.";}else {if($prevcont==0){echo "This page has not yet been visited";
	} else {
	echo "This page has been visited ".$prevcont." time(s)";
	}
	echo ", although your count is not required - This site has been visited previously by your IP.";
	}
	if($_SERVER['REMOTE_ADDR']=="::1") {
		echo " Welcome, Web Hosts. I hope you enjoy this page.";
	}
} else {
	echo "NOTE TO ADMIN: File counter will not work unless folder called 'counter' is created in the same directory as 'linkcounter.php'. Attempt to create directory? <a href='linkcounter.php?cd=true'>Yes</a>";
	if($_GET['cd']=="true") {
		mkdir('counter');
		file_put_contents($cff,"This file is here so that the code knows that this folder is here. Please do not delete it, otherwise count numbers may be reset. Please also do not edit it, as this may also make the numbers require a reset. This counter was created by Zoweb, in 2015. Find his website at www.zoweb.me.");
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}
?>
