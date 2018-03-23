<?php
	class SavingsAccount extends Account {
		private $interest = 0.0;
		
		public function __construct($account_number, $balance){
			parent::__construct($account_number, $balance);
			
		}
		
		public function set_interest($ir){
			$this->interest = $ir;
		}
	}