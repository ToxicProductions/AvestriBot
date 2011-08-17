<?php
set_time_limit(0); //Make sure the bot doesn't bomb out from execution timeouts
$config = array(
"nick" = "AvestriBot", //Bot Nickname
"pass" = "", //Nickserv Password
"real" = "AvestriBot", //The real name for the bot
"server" = "irc.x10hosting.com", //The IRC Server (No support for password protected servers yet)
"port" = 6667, //server port
"chan" = "#avestribot", //Channel to join
);
//There should be no need to edit beyond this point. All commands are in ./cmd/main.php
/*   
        _
       / \
      / | \
     /  |  \	STOP THERE IS NO NEED TO EDIT BEYOND HERE!
    /   _   \
   /   (_)   \
  /___________\
   
*/
class bot{
	$config = array();
	function __construct($config){
		$this->$config = $config;
		$this->main();
	}
	function main(){
		$fp = fsockopen($this->$config['server'], $this->$config['port']);
		if(!$fp){
			echo("Cannot connect to the server");
			die();
		}
	}
		
}