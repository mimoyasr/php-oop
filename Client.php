<?php
	/**
	 * Client class defines a bank client 
	 */
	 
	class Client {
		private	$first_name = '',
				$last_name = '';
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

			if(AppError::exist()) AppError::show_errors();
		}
		
		private function _validate_name($name){
			$match = preg_match('/^[a-z][a-z \']*$/i', $name);
			if(!$match) AppError::add_error('Invalid name');
			
			return $match;
		}
	}
	
	