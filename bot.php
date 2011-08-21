<?php
//DO NOT MODIFY THIS!
set_time_limit(0);
ini_set("display_errors", "off");
error_reporting("E_NONE");
//END OF DO NOT MODIFY
//There should be no need to edit beyond this point. All commands are in ./cmd/COMMANDNAME and commands should be added to ./cmd/main.php

/*   

        _
       / \
      / | \
     /  |  \  STOP THERE IS NO NEED TO EDIT BEYOND HERE UNLESS SUPPORT STAFF SAY OTHERWISE!
    /   _   \
   /   (_)   \
  /___________\

   
*/
include("./core/config.php");
class IRCBot {
	var $socket;
	var $ex = array();
	var $db;
	var $admins;
	var $gun = array(1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1);
	var $char = array("#avestribot" => "@", "#avestri" => "~");
	var $messages = array();
	var $config = array();
	function __construct($config){
		$this->socket = fsockopen($config["server"], $config["port"]);
		$this->db = mysql_connect("{$config['sqlhost']}:{$config['sqlport']}", $config['sqluser'], $config['sqlpass']) or die(mysql_error());
		mysql_select_db("{$config['db_name']}") or die(mysql_error());
		$this->flush();
		$this->login($config);
		$this->main($config);
	}
	function main($config){
		include("./core/main.php");
		$this->main($config); //WARNING: Do not remove this otherwise the bot will not function. Think of it as a poor mans loop.
	}
	function login($config){
		$this->send_data("USER ", $config["nick"]." 8 * :".$config["name"]);
		$this->send_data("NICK ", $config["nick"]);
		if(strrpos(fgets($this->socket, 256), $config['nick']." :Nickname is already in use.")){
			$this->error("Nick in use", 4);
			die();
		}
		$this->send_data("PRIVMSG NickServ :IDENTIFY {$config['pass']}");
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
				exit;
			default:
				echo(date("h:i:s", time())." [UNKNOWN ERROR] - ".$msg."\r\n");
				break;
		}
	}
	function flush(){
		$admins = parse_ini_file("./core/admins.ini");
		$this->admins = $admins;
	}
	function get_level($nick){
		$admins = parse_ini_file("./core/admins.ini");
		$this->admins = $admins;
		foreach($this->admins as $n => $l){
			if($n == $nick){
				$level = $l;
			}
		}
		if(!isset($level) || $level === NULL){
			$level = 0;
		}
		if($nick == $this->config["owner"]){
			$level = 9999; //SuperUser mode
		}
		return $level;
	}
	function send_data($cmd, $msg = null){
		if($msg == null){
			fputs($this->socket, $cmd."\r\n");
			echo date("h:i:s", time())." - ".$cmd."\r\n";
		}else{
			fputs($this->socket, $cmd.$msg."\r\n");
			echo date("h:i:s", time())." - ".$cmd." ".$msg."\r\n";
		}
	}

	function join_channel($channel){
		if(is_array($channel)){
			foreach($channel as $chan){
				$this->send_data("JOIN ", $chan);
			}

		}else{
			$this->send_data("JOIN ", $channel);
		}
	}
	function query($q, $c = ""){
		if($c == ""){
			$qr = mysql_query($q);
		}else{
			$qr = mysql_query($q, $c);
		}
		return($qr);
	}
	function write_php_ini($array, $file)
	{
		$res = array();
		foreach($array as $key => $val)
		{
			if(is_array($val))
			{
				$res[] = "[$key]";
				foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
			}
			else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
		}
		$this->safefilerewrite($file, implode("\r\n", $res));
	}
	function safefilerewrite($fileName, $dataToSave)
	{    if ($fp = fopen($fileName, 'w'))
		{
			$startTime = microtime();
			do
			{            $canWrite = flock($fp, LOCK_EX);
			   // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
			   if(!$canWrite) usleep(round(rand(0, 100)*1000));
			} while ((!$canWrite)and((microtime()-$startTime) < 1000));

			//file was locked so now we can store information
			if ($canWrite)
			{            fwrite($fp, $dataToSave);
				flock($fp, LOCK_UN);
			}
			fclose($fp);
		}

	}
}
$bot = new IRCBot($config);
?>