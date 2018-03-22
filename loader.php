<?php
	spl_autoload_register(function($class_name){
		$class_dirs = [
			'./classes',
			'./controllers',
			'./models'
		];
		foreach($class_dirs as $dir){
			$include = "{$dir}/{$class_name}.php";
			if(is_file($include)){
				include($include);
				return;
			}
		}
	});
	
	function route($request) {
		// get controller and action
		$controller = $request->uri(0);
		$action = $request->uri(1);

		// route controller and action
		echo "Controller: {$controller}<br>";
		echo "Action: {$action}<br>";

		if(!class_exists($controller) || !is_callable([$controller, $action])){
			$controller = 'BadRequest';
			$action = 'not_found';
		}

		/*
		$c = new $controller();
		$c->$action();
		*/
		$c = new $controller($request);
		call_user_func_array([$c, $action], []);
	}
