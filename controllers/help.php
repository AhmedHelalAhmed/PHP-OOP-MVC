<?php
	class help extends Controller{

		public function classes(){
			echo 'PHP classes help topics';
		}
		
		public function functions(){
			echo 'Some PHP functions: array_map, str_replace, explode, implode';
		}
		
		public function variables(){
			$data = [
				'variables' => [
					'abc' => 123,
					'xyz' => 'Hello world'
				]
			];
			echo $this->load_view('./views/variables.php', $data);
		}
	}