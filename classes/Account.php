<?php

	class Account {
		protected $account_number;
		
		public function __construct($account_number) {
			if(!$this->_validate_account($account_number)){
				AppError::show_errors();
				return;
			}
			
			$this->account_number = $account_number;
		}
		
		protected function _validate_account($num){
			if($num >= 1000000000 && $num <= 9999999999) return true;
			
			AppError::add_error('Invalid account number');
			return false;
		}
	}
	