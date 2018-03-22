<?php
	class help extends Controller{
		public function classes(){
			echo 'PHP classes help topics';
		}
		
		public function functions(){
			echo 'Some PHP functions: array_map, str_replace, explode, implode';
		}
		
		public function variables(){
			echo 'PHP variables start with $' 
				. $this->request->uri(2) . ' '
				. $this->request->get('id') . ' '
				. $this->request->get('filter');
		}
	}