<?php
	/**
	 * Client class defines a bank client 
	 */
	 
	class Client {
		private	$first_name = '',
				$last_name = '',
				$errors = [];
		public	$dob,
				$phone,
				$address;
		
		/**
		 *  @brief Retrieve client full name
		 *  
		 *  @return string, full name of client
		 */
		public function full_name(){
			return "{$this->first_name} {$this->last_name}";
		}
		
		public function __construct($fname, $lname){
			if($this->_validate_name($fname))
				$this->first_name = $fname;
			
			if($this->_validate_name($lname))
				$this->last_name = $lname;

			if(count($this->errors)) $this->show_errors();
		}
		
		private function _add_error($error){
			$this->errors[] = $error;
		}
		
		public function show_errors(){
			echo "<ul>";
			foreach($this->errors as $e){
				echo "<li class=\"text-danger\">{$e}</li>";
			}
			echo "</ul>";
		}
		
		private function _validate_name($name){
			$match = preg_match('/^[a-z][a-z \']*$/i', $name);
			if(!$match) $this->_add_error('Invalid name');
			
			return $match;
		}
	}
	
	