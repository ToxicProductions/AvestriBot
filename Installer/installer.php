<?php
function read(){
	$handler = fopen("php://stdin", "r");
	$line = fgets($handler);
	return trim($line);
}
echo("
      ___    __           __    _____     _____   ____________
     / _ \   \ \         / /   |     |   /  __/  |____    ____|
    / / \ \   \ \       / /    |   __|   \  \         |  | 
   / /___\ \   \ \     / /     |  |__     \  \        |  |
  / _______ \   \ \   / /      |   __|     \  \       |  |
 / /       \ \   \ \_/ /       |  |__     __\  \      |  |
/_/         \_\   \___/        |_____|   /_____/      |__|
");
echo("Welcome to the AvestriBot Installer! Do you want to continue? (Y/n) ");
if(strtolower(read()) != "n"){
	echo("OK! Firstly, what is the server IP/hostname you want to connect to? ");
	if(read() == ""){
		echo("You never specified a server!");
		die();
	}
}