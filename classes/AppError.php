<?php
	class AppError {
		static $errors = [];
		
		public static function add_error($error){
			self::$errors[] = $error;
		}
		
		public static function show_errors(){
			echo "<ul>";
			foreach(self::$errors as $e){
				echo "<li class=\"text-danger\">{$e}</li>";
			}
			echo "</ul>";
		}
		
		public static function exist(){
			return (count(self::$errors) ? true : false);
		}
		
		private function __construct(){ }
		
		private function __clone(){ }
	}