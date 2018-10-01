<?php
	require_once 'vendor/autoload.php';
	require_once 'generated-conf/config.php';
	//$dt =$_REQUEST["dt"];
	$dateTimeNow = new DateTime();
	session_start();
	if($_SESSION){
		$account = AccountQuery::create()->findOneById($_SESSION["id"]);
		if($account){
			$dt = $_REQUEST["dt"];
				
			echo date_format(date_create($dt), "Y/m/d H:i:s")."<br>";
			echo "here: ".strtotime($dt)."<br>";
			echo $dt."<br>";
			if($_REQUEST["active"] == 1){
				$account->setLastActive($dateTimeNow);//dateformat(date_create($dt), "Y/m/d H:i:s"));
				$account->save();
			}
		}else{
			header("Location: logout.php");
		}
	}
	else{
		header("Location: login.php");
	}
	//$dateTimeNow = new DateTime();
	echo $dateTimeNow->format("Y/m/d H:i:s")."<br>";
	
	$accounts = AccountQuery::create()->find();
	echo "<table class='table'>
		    <thead>
		        <tr>
			  <th>Username</th>
			  <th>Last Active</th>
			  <th>Status</th>
			</tr>
		    </thead>
		    <tbody>";
	foreach($accounts as $val){
		echo "<tr><td>".$val->getUsername()." </td><td> ".date_format($val->getLastActive(),"Y/m/d H:i:s")."<td>";
		echo round((date_timestamp_get( new DateTime())  - date_timestamp_get($val->getLastActive()))/60);
		echo "</tr>";
	}
	echo "</tbody></table>";

?>
