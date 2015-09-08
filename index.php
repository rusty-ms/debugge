<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="static/style.css">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div id="maincontainer">

<div id="topsection"><div class="innertube"><h1>DEBUGGE DEV</h1></div></div>

<div id="contentwrapper">
	<div id="contentcolumn">
		<div class="innertube">

<?php
require ('includes/AltoRouter.php');
require ('includes/config.php');
$router = new AltoRouter();

$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/', function() {
	require __DIR__ . '/views/home.php';
});

// map homepage
$router->map( 'GET', '/about', function() {
	require __DIR__ . '/views/about.php';
});

// map user details page
$router->map( 'GET', '/user/[i:id]/', function( $id ) {
	require __DIR__ . '/views/user-details.php';
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>


			</div>
		</div>
</div>

<div id="footer"><a href="/">Home</a> | <a href="/about">About Us</a></div>

</div>

</body>