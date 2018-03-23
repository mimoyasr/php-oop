<?php
	include('./includes.php');
	
	$client = new Client('Ahmed', 'Saeed');
	
	echo $client->full_name()."<br>";
	
	$client->add_account(1000000015, 1000)->add_checkbook();
	$client->add_account(1000000016, 1000);
	$client->add_account(1000000018, 1000, 'savings')->set_interest(0.1);
	
	$client
	->accounts[0]
	->Deposit(1000)    // make a deposit of 1000 to client's account #0
	->Withdraw(500)    // withdrawf 500 from client's account #0
	->Transfer(200, $client->accounts[1])  // transfer 200  from client's account #0 to account #1
	->Balance()   // print balance of client's account #2 (should be 300)
	->Transactions(); // display list of transactions of client's account #0 (3 transactions)

// echo "<pre>";
// 	var_dump($client);
// echo "</pre>";
	
