<?php
if($this->get_level($nick) < 5){
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do that!");
}else{
	$this->admins[$this->ex[4]] = -1;
	$this->send_data("PRIVMSG $chan :", "Now ignoring {$this->ex[4]}.");
}
?>