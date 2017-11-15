<?php 
spl_autoload_register(function($className){
	$folder = preg_match('#(Model.php)$#')?'../Models/':'../Classes/';
	$file = $className.'.php';

	$path = $folder.$file;

	if (file_exists($path)) {
		require_once($path);
	}

})
?>