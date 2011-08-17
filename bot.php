<?php
set_time_limit(0); //Make sure the bot doesn't bomb out from execution timeouts
$config = array(
"nick" => "AvestriBot", //Bot Nickname
"pass" => "", //Nickserv Password
"real" => "AvestriBot", //The real name for the bot
"server" => "irc.x10hosting.com", //The IRC Server (No support for password protected servers yet)
"port" => 6667, //server port
"chan" => "#avestribot", //Channel to join
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
$sys = new sys;
$bot = new bot($config);
class sys{
	function trace($msg){
		echo(date("h:i:s", time())." - ".$msg);
	}
	function error($msg,$level){
		switch($level){
			case 1:
				echo(date("h:i:s", time())." [NOTICE] - ".$msg);
				break;
			case 2:
				echo(date("h:i:s", time())." [WARNING] - ".$msg);
				break;
			case 3:
				echo(date("h:i:s", time())." [ERROR] - ".$msg);
				break;
			case 4:
				echo(date("h:i:s", time())." [FATAL] - ".$msg);
				break;
			default:
				echo(date("h:i:s", time())." [UNKNOWN ERROR] - ".$msg);
				break;
		}
	}
	function ident(){
		$res = $this->raw("NICK ".$bot->$config['nick']);
		if(strrpos($res, $bot->$config['nick']." :Nickname is already in use.") !== false){
			$this->error("Nickname already in use!", 4);
		}else{
			$this->raw("USER ".$bot->$config['nick']." 8 * : ".$bot->$config['real']);
		}
	}
	function raw($com){
		fwrite($bot->$fp, $com);
		return fgets($bot->$fp);
	}
}
class bot{
	var $config = array();
	var $fp;
	function __construct($config){
		$this->main($config);
	}
	function init($config){
		if(is_array($this->$config)){
			foreach($config as $k => $v){
				$this->$config[$k] = $v;
			}
		}else{
			$sys->error("Cannot create configuration array!", 4);
		}
	}
	function main($c){
		$this->init($c);
		$this->$fp = fsockopen($this->$config['server'], $this->$config['port']);
		if(!$fp){
			echo("Cannot connect to the server");
			die();
		}
		$sys->trace("Connected to server");
		$sys->trace("Identifying");
		$sys->ident();
	}	
}