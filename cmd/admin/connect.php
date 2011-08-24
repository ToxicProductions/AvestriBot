<?php
if($this->get_level($nick) < 11){
	$this->send_data("PRIVMSG $chan :", "You need to be a super user to do this.");
}else{
	$this->send_data("PRIVMSG $chan :", "Connecting..");
	$a = $this->ex[4];
	$b = $this->ex[5];
	$c = $this->ex[6];
	$d = $this->ex[7];
	$e = $this->ex[8];
	$bot = createbot($a,$b,$c,$d,$e);
}