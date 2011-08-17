<?php
//DO NOT MODIFY THIS!
set_time_limit(0);
ini_set("display_errors", "off");
//END OF DO NOT MODIFY

//Connection Data
$config = array(
"server" => "irc.x10hosting.com", //Server IP/Hostname
"port"   => 6667, //Server Port
"channel" => "#avestribot", //Channel
"name"   => "AvestriBot", //Bot's Realname
"nick"   => "AvestriBot", //Bot's Nickname
"pass"   => "", //Nickserv password (if applicable)
"admins" => array("GtoXic" => 10, "GothX" => 10),
);
//There should be no need to edit beyond this point. All commands are in ./cmd/COMMANDNAME.php and commands should be added to ./cmd/main.php

/*   

        _
       / \
      / | \
     /  |  \  STOP THERE IS NO NEED TO EDIT BEYOND HERE UNLESS SUPPORT STAFF SAY OTHERWISE!
    /   _   \
   /   (_)   \
  /___________\

   
*/
class IRCBot {
	var $socket;
	var $ex = array();
	function __construct($config){
		$this->socket = fsockopen($config["server"], $config["port"]);
		$this->login($config);
		$this->main($config);
	}

	function login($config){
		$this->send_data("USER", $config["nick"]." 8 * :".$config["name"]);
		$this->send_data("NICK", $config["nick"]);
		if(strrpos(fgets($this->socket, 256), $config['nick']." :Nickname is already in use.")){
			$this->error("Nick in use", 4);
			die();
		}
		$this->join_channel($config["channel"]);
	}
	function error($msg,$level){
		switch($level){
			case 1:
				echo(date("h:i:s", time())." [NOTICE] - ".$msg."\r\n");
				break;
			case 2:
				echo(date("h:i:s", time())." [WARNING] - ".$msg."\r\n");
				break;
			case 3:
				echo(date("h:i:s", time())." [ERROR] - ".$msg."\r\n");
				break;
			case 4:
				echo(date("h:i:s", time())." [FATAL] - ".$msg."\r\n");
				break;
			default:
				echo(date("h:i:s", time())." [UNKNOWN ERROR] - ".$msg."\r\n");
				break;
		}
	}
	function main($config){
		$data = fgets($this->socket, 256);
		echo($data);
		flush();
		$this->ex = explode(" ", $data);
		if($this->ex[0] == "PING"){
			$this->send_data("PONG", $this->ex[1]);
		}
		$nick = explode("!", $this->ex[0]);
		$host = $nick[1];
		$host = explode(" PRIVMSG ", $host);
		$host = $host[0];
		$nick = $nick[0];
		$chan = $this->ex[2];
		$command = str_replace(array(chr(10), chr(13)), "", $this->ex[3]);
		$command = substr($command, 1);
		include("./cmd/main.php");
		$this->main($config);
	}
	function get_level($nick){
		include("./core/admins.php");
		var_dump($admins);
		foreach($admins as $n => $l){
			if($n == $nick){
				echo("true");
				$level = $l;
			}
		}
		if(!isset($level) || $level === NULL){
			$level = 0;
		}
		return $level;
	}
	function send_data($cmd, $msg = null){
		if($msg == null){
			fputs($this->socket, $cmd."\r\n");
			echo date("h:i:s", time())." - ".$cmd."\r\n";
		}else{
			fputs($this->socket, $cmd." ".$msg."\r\n");
			echo date("h:i:s", time())." - ".$cmd." ".$msg."\r\n";
		}
	}

	function join_channel($channel){
		if(is_array($channel)){
			foreach($channel as $chan){
				$this->send_data("JOIN", $chan);
			}

		}else{
			$this->send_data("JOIN", $channel);
		}
	}
}
$bot = new IRCBot($config);
?>