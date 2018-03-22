<?php
	// bootstrapping
		include('./loader.php');
		$request = new Request;
		// load config
		// autoloading
		// db connection
		
	// get controller and action
	$uri = isset($_GET['cont']) ? $_GET['cont'] : 'home/index';
	list($controller, $action) = explode('/', $uri);
	
	// route controller and action
	echo "Controller: {$controller}<br>";
	echo "Action: {$action}<br>";
	
	route($controller, $action);