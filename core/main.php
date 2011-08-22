<?php
$this->config = $config;
$data = fgets($this->socket, 256);
echo($data);
$data = str_replace(chr(10), "", $data);
$data = str_replace(chr(13), "", $data);
flush();
$this->ex = explode(" ", $data);
if(isset($this->ex[0])){
	if($this->ex[0] == "PING"){
		$this->send_data("PONG ", $this->ex[1]);
	}
}
if(isset($nick)){
	$host = $nick[1];
	$host = explode(" ", $host);
	$host = $host[0];
	$nick = substr($nick[0],1);
}
if(isset($this->ex[2])){
	$chan = $this->ex[2];
}
if(isset($this->ex[1])){
	if($this->ex[1] == "PRIVMSG"){
		$fp = fopen("./$chan.log", "a");
		fwrite($fp, $data);
		fclose($fp);
		$nick = explode("!", $this->ex[0]);
		if(isset($nick)){
			$host = $nick[1];
			$host = explode(" ", $host);
			$host = $host[0];
			$nick = substr($nick[0],1);
		}

	}
}
$command = str_replace(array(chr(10), chr(13)), "", $this->ex[3]);
$command = substr($command, 1);
if($this->ex[1] == "PRIVMSG"){
	if(array_key_exists($nick, $this->messages)){
		if(time() - $this->messages[$nick][0] < 5){
			$this->messages[$nick][1]++;
			if($this->messages[$nick][1] > 5 && $this->get_level($nick) > -1 && $nick != $config['owner']){
				$this->send_data("PRIVMSG $chan :", "$nick: You are now on the ignore list for spamming commands at a rate of 1+ messages per second.");
				$this->admins[$nick] = -1;
				$this->write_php_ini($this->admins, "./core/admins.ini");
			}
		}else{
			$this->messages[$nick][1] = 1;
			$this->messages[$nick][0] = time();
		}
	}else{
		$this->messages[$nick][0] = time();
		$this->messages[$nick][1] = 1;
	}
	$notes = parse_ini_file("./cmd/note/notes.ini");
	if(array_key_exists($nick, $notes)){
		$arr = array();
		$this->send_data("PRIVMSG $chan :", "$nick: You have a note waiting for you: {$notes[$nick]} That's all.");
		foreach($notes as $note => $msg){
			if($note != $nick){
				$arr[$note] = $msg;
			}
		}
		$this->write_php_ini($arr, "./cmd/note/notes.ini");
	}
}
include("./cmd/main.php");
?>