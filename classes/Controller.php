<?php
	abstract class Controller {
		protected $request;
		
		public function __construct($request){
			$this->request = $request;
		}
		
		/**
		 *  @brief loads given view and passes given data
		 *  
		 *  @param [in] $view string, path to view file
		 *  @param [in] $data array, data to pass to view
		 *  @return string, output to browser
		 */
		public function load_view($view, $data = []){
			//if($this->cache($view)) return $this->cache($view);
			
			if(is_file($view)){
				ob_start();
				include($view);
				$output = ob_get_clean();
				//$this->cache($view, $output);
				return $output;
			}
			
			return '';
		}
	}