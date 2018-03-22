<?php
	include('./AppError.php');
	
	AppError::add_error('Test error 1');
	AppError::add_error('Test error 2');
	
	AppError::show_errors();
	
	$err = new AppError;
	$err2 = $err;
	
	$err->add_error('Test error 11');
	$err->add_error('Test error 12');
	
	$err2->add_error('Test error 21');
	$err2->add_error('Test error 22');
	
	$err->show_errors();
	
	$err2->show_errors();