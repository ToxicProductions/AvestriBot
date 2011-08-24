<?php
if($this->get_level($nick) > 9){
	if(file_exists("./installer/installer.php")){
		$this->send_data("PRIVMSG $chan :", "the installer exists. We recommend removing it.");
	}
}else{
	$this->send_data("PRIVMSG $chan :", "You need level 10 to do that");
}
?>