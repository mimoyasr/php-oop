<?php
	include('./Client.php');
	
	$client = new Client('Ahm6ed', 'Saeed');
	
	echo $client->full_name();
	//echo $client->first_name . ' ' . $client->last_name;