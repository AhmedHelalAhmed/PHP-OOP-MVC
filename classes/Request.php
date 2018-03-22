<?php
	class Request{
		private $get = [], $post = [];

		public function __construct(){			
			static $session_open = false;
			
			if($session_open === false){
				session_start();
				$session_open = true;
			}
			
			$this->get = $_GET;
			$this->post = $_POST;
			unset($_GET, $_POST);
		}
		
		public function get($var){
			if(isset($this->get[$var])) return $this->get[$var];
			return null;
		}
		
		public function post($var){
			if(isset($this->post[$var])) return $this->post[$var];
			return null;
		}
		
		public function session($var, $val = null){
			if($val !== null) $_SESSION[$var] = $val;

			if(isset($_SESSION[$var])) return $_SESSION[$var];
			return null;
		}
	}
	
