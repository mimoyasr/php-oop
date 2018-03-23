<?php
	class CurrentAccount extends Account {
		private $has_checks = false;
		
		public function __construct($account_number, $balance){
			parent::__construct($account_number, $balance);
			
		}
		
		public function add_checkbook(){
			$this->has_checks = true;
		}
	}