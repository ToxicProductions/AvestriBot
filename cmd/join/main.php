<?php
if($this->get_level($nick) >= 4){
	if(isset($this->ex[5])){
		$this->char[$this->ex[4]] = $this->ex[5];
	}
	$this->join_channel($this->ex[4]);
}else{
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do that, you must be level 4 or higher.");
}
?>