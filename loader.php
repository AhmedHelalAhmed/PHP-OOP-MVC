<?php
	spl_autoload_register(function($class_name){
		$include = "./controllers/{$class_name}.php";
		if(is_file($include)){
			include($include);
		}
	});
	
	function route($controller, $action) {
		if(!class_exists($controller) || !is_callable([$controller, $action])){
			$controller = 'BadRequest';
			$action = 'not_found';
		}

		/*
		$c = new $controller();
		$c->$action();
		*/
		$c = new $controller;
		call_user_func_array([$c, $action], []);
	}
