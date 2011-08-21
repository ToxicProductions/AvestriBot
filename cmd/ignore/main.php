<?php
if($this->get_level($nick) < 5){
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do that, you must be level 5 or higher.");
}else{
	if($this->ex[4] == NULL){
		$ini = parse_ini_file("./core/admins.ini");
		$message = "Ignored users: ";
		foreach($ini as $user => $lvl){
			if($lvl == -1){
				$message .= $user.", ";
			}
		}
		$message = substr($message, 0, strlen($message)-2);
		$this->send_data("PRIVMSG $chan :", $message);
	}else{
		$this->admins[$this->ex[4]] = -1;
		$this->send_data("PRIVMSG $chan :", "Now ignoring {$this->ex[4]}.");
	}
}
?>