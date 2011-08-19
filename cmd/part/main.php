<?php
if($this->get_level($nick) >= 3){
	$this->send_data('PART '.$this->ex[4].' :', 'AvestriBot Coded by Toxic Productions Founders: GothX and GtoXic');
}else{
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do this, you must be level 3 or higher.");
}
?>