<?php

	require_once 'vendor/autoload.php';

	require_once 'generated-conf/config.php';
	
	$q = $_REQUEST["q"];

	$account = AccountQuery::create()->findOneByUsername($q);
	if($account){
		echo " ";
	}
	else{
		echo "already exists";
	}
?>
