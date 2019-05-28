<?php
/*
This is my solution for the laboration that Niklas Mårdby share on his wiki Porkforge.
I've used this laboration to show my pupils how you can work with PHP in developement.
http://porkforge.mardby.se/index.php?title=PHP_Laboration_2_-_Projektstart,_require_och_GET
*/

// We tell the page to require a file called functions
require 'resources/includes/view.php';
require 'resources/includes/model.php';


// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

$template = 'page';


// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);
$error = "";
if(empty($page)) {
	$header = 'Start';
	$content = 'Welcome to my site, if you know dah wae you have come to the right place. ;)';
	$template = 'page';
}

elseif($page == 'blogg') {
	$header = 'Blogg';
	$template = 'all-blog-posts';
	$post = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);

	if(array_key_exists($post, $model)){
		$template = 'single-blog-post';
		$title = $model[$post]['title'];
		$author = $model[$post]['author'];
		$date = $model[$post]['date'];
		$message = $model[$post]['text'];
	}

	elseif(!empty($post)){
		$header = 'ERORR 404';
		$error = 'Denna sidan existerar ej';
		$template = 'page';
	}
}

elseif($page == 'kontakt') {
	$header = 'Kontakt';
	$content = 'Du når oss på epost@labb2.se';
}

elseif($page == 'create') {
	$header = 'Create';
	$content = 'Du når oss på epost@labb2.se';
	$template = 'create';
}
else {
	echo "Den sökta sidan finns inte";
}

require 'resources/templates/'.$template.'-template.php';

?>
