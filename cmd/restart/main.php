<?php
if($this->get_level($nick) > 9){
	$this->send_data('QUIT ', 'AvestriBot Coded by Toxic Productions Founders: GothX and GtoXic');
	exec("nohup php bot.php");
}else{
	$this->send_data("PRIVMSG $chan :", "You are not authorised to do that, you must be level 10 or higher.");
}
?>