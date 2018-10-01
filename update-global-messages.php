<?php
       require_once 'vendor/autoload.php';
        require_once 'generated-conf/config.php';
	$gm = GlobalchatQuery::create()->orderByTimePosted()->find();

foreach ($gm as $m){
	$user = AccountQuery::create()->findOneById($m->getAccountId());
	
	echo "<b style ='color:yellow'>".$user->getUsername()."</b>  "."  <b style = 'color:green'>"
		.$m->getTimePosted()->format('Y/m/d H:i:s').": </b> <i style = 'color:snow;'>".$m->getMessage()."</i><br>";	

}
?>
