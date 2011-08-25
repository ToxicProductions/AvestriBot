<?php
if($this->get_level($nick) < 11){
	$this->send_data("PRIVMSG $chan :", "You need to be a super user to do this.");
}else{
	$this->send_data("PRIVMSG $chan :", "Connecting..");
	$a = $this->ex[5];
	$b = $this->ex[6];
	$c = $this->ex[7];
	$d = $this->ex[8];
	$e = $this->ex[9];
	$bot = createbot($a,$b,$c,$d,$e);
}