<?php
function read(){
	$handler = fopen("php://stdin", "r");
	$line = fgets($handler);
	return trim($line);
}
echo("
      ___    __           __    _____     _____   ____________     ______     ________        ___      ____     ____________
     / _ \   \ \         / /   |     |   /  __/  |____    ____|   /  _   \   |__    __|      |   \    /    \   |____    ____|
    / / \ \   \ \       / /    |   __|   \  \         |  |        | /_\  |      |  |         | | |   /   _  \       |  |
   / /___\ \   \ \     / /     |  |__     \  \        |  |        |    __/      |  |         |___/   |  | | |       |  |
  / _______ \   \ \   / /      |   __|     \  \       |  |        | |\ \        |  |         |   \   |  |_| |       |  |
 / /       \ \   \ \_/ /       |  |__     __\  \      |  |        | | \ \     __|  |__       | | |   \      /       |  |
/_/         \_\   \___/        |_____|   /_____/      |__|        |_|  \_\   |________|      |___/    \____/        |__|

                                              _____          _____
                                             |  _  |        |  _  |
                                             | | | |        | | | |
                                             | | | |        | | | |
                                             | | | |        | | | |
                                             | | | |        | | | |
                                             | | | |        | | | |
                                             | |_| |        | |_| |
                                             |_____|   __   |_____|
                                                      |  |  
                                                      |  |
                                                      |  |
                                                      |  |
                                                      |__|
          
          
                                             _______________________
                                             \                     /
                                              \                   /
                                               \   ___________   /
                                                \  \         /  /
                                                 \__\_______/__/
                                                     \     /
                                                      \   /
                                                       \ /
                                                        V
"); 
echo("Welcome to the AvestriBot Installer! Do you want to continue? (Y/n) ");
if(strtolower(read()) != "n"){
	echo("OK! Firstly, what is the server IP/hostname you want to connect to? ");
	if(read() == ""){
		echo("You never specified a server!");
		die();
	}
}