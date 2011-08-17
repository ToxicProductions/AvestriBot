<?php
if($this->get_level($nick) == 10){
	$this->send_data('QUIT', 'AvestriBot Coded by Toxic Productions Founders: GothX and GtoXic');
	die();
}else{
	$level = $this->get_level($nick);
	if($level == NULL){
		$level = 0;
	}
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do this, you must be level 10 or higher, you are level $level");
}
?>