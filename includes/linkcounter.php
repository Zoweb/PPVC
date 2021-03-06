<?php
// Set the location of the readme.config file
$cff="counter/readme.config";

// Try to find the readme.config file with it's specific text and run some commands if it can
if (file_get_contents($cff) === "This file is here so that the code knows that this folder is here. Please do not delete it, otherwise count numbers may be reset. Please also do not edit it, as this may also make the numbers require a reset. This counter was created by Zoweb, in 2015. Find his website at www.zoweb.me.") {
  // Set the location of the IP file, and if it is ::1 (localhost) save it as .webhost.txt
	$newconta=$_SERVER['REMOTE_ADDR'];
	$filea="counter/" . $newconta . ".txt";
	if ($filea == "counter/::1.txt") {
		$filea = "counter/.webhost.txt";
	}

	// Set position of and read number.txt (holds how many visits)
	$file="counter/number.txt";
	$prevcont=file_get_contents($file);

	// If the IP file does not exist, create it
	if (!file_exists($filea)) {
		file_put_contents($filea,$newconta);
		// Add 1 to the number in the number.txt file
		$newcont=$prevcont+1;
		file_put_contents($file,$newcont);
		// Echo the information (OPTIONAL)
		echo "This page has been now been visited ".$newcont." time(s)";
		echo ". Your IP (".$_SERVER['REMOTE_ADDR'].") has not yet visited this site, so has been counted on our counter.";
	} else {
    // If the page has not been visited, say that, or say how many times it has been visited if it has (OPTIONAL)
		if ($prevcont == 0) {
		echo "This page has not yet been visited";
    } else {
      echo "This page has been visited " . $prevcont . " time(s)";
    }
    // If an IP has previously visited, it states:
    echo ", although your count is not required - This site has been visited previously by your IP.";
  }
  // If the IP is localhost, say welcome to the web hosts as they run the computer (OPTIONAL)
  if($_SERVER['REMOTE_ADDR'] == "::1") {
    echo " Welcome, Web Hosts. I hope you enjoy this page.";
  }
} else {
  // If the file readme.config is not there or is changed, PPVC will asume that the folder is not there and requires creation (RECOMENDED)
  echo "NOTE TO ADMIN: File counter will not work unless folder called 'counter' is created in the same directory as 'linkcounter.php'. Attempt to create directory? <a href='linkcounter.php?cd=true'>Yes</a>";
  if($_GET['cd']=="true") {
    mkdir('counter');
    file_put_contents($cff,"This file is here so that the code knows that this folder is here. Please do not delete it, otherwise count numbers may be reset. Please also do not edit it, as this may also make the numbers require a reset. This counter was created by Zoweb, in 2015. Find his website at www.zoweb.me.");
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }
}

// NOTE: This will work across servers (if file/folder creation is enabled) that have this PHP file. File and folder creation must be enabled for PHP. Ignore any file errors that come up, I don't know why they do and they don't on Localhost. To use, simply include this file into your PHP document. It will then work automatically.

?>
