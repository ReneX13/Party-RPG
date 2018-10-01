<?php

require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';
session_start();
if($_SESSION){
	$user = AccountQuery::create()->findOneById($_SESSION["id"]);
	if($_REQUEST["m"] && $user){
		$new_gm = new Globalchat();
		$new_gm->setAccountId($_SESSION["id"]);
		$new_gm->setMessage($_REQUEST["m"]);
		
		$new_gm->setTimePosted(date('Y-m-d H:i:s'));
		$new_gm->save();

	}
}
?>
