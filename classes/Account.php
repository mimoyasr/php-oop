<?php

	class Account {
		protected 	$account_number,
					$balance = 0,
					$transactions = [] ;
		
		public function __construct($account_number, $balance) {
			if(!$this->_validate_account($account_number)){
				AppError::show_errors();
				return;
			}
			if(!$this->_validate_balance($balance)){
				AppError::show_errors();
				return;
			}
			
			$this->account_number = $account_number;
			$this->balance = $balance;
		}
		public function Deposit($value, $log = true){

			if(!$this->_validate_deposit($value)){
				AppError::show_errors();
				return;
			}

			$this->balance += $value ;
			if($log){
				$this->_add_transaction("Deposited {$value} and new balance is {$this->balance}");
			}
			return $this;
		}
		public function Withdraw($value, $log = true){

			if(!$this->_validate_withdraw($value)){
				AppError::show_errors();
				return;
			}
			
			$this->balance -= $value ;
			if($log){
				$this->_add_transaction("Withdraw {$value} and new balance is {$this->balance}");
			}
			return $this;
		}
		public function Transfer($value, $to){

			$this->Withdraw($value, false);
			$to->Deposit($value, false);
			$this->_add_transaction("Transfered {$value} to {$to->account_number} and new balance is {$this->balance}");
			return $this;
		}
		public function Balance(){
			echo "<br> Balanse of account {$this->account_number} is {$this->balance} <br>";
			return $this;
		}
		public function Transactions(){
			echo "<br>   List of transactions of account {$this->account_number} :<br>";
			foreach ($this->transactions as  $value) {
				echo "{$value} <br>";
			}
			echo "<br>";
			return $this;
		}
		protected function _add_transaction($transaction){
			$this->transactions[] = $transaction ; 	
		}
		protected function _validate_account($num){
			if($num >= 1000000000 && $num <= 9999999999) return true;
			
			AppError::add_error('Invalid account number');
			return false;
		}
		protected function _validate_balance($num){
			if($num >= 1000 ) return true;
			
			AppError::add_error('Invalid Balance');
			return false;
		}
		protected function _validate_deposit($num){
			if($num > 0) return true;
			
			AppError::add_error('Invalid Deposit');
			return false;
		}
		protected function _validate_withdraw($num){
			if($num > 0 && $num < $this->balance) return true;
			
			AppError::add_error('Invalid Withdraw ');
			return false;
		}
	}
	