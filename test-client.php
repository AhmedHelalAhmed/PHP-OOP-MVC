<?php
	include('./includes.php');
	
	
	$client = new Client('Ahmed', 'Saeed');
	
	echo $client->full_name();
	//echo $client->first_name . ' ' . $client->last_name;
	
	$client->add_account(1000000015)->add_checkbook();
	$client->add_account(1000000016);
	$client->add_account(1000000018, 'savings')->set_interest(0.1);
	
	var_dump($client->accounts);
	
