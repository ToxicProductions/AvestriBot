<?php
if($this->get_level($nick) > 0){
	switch($this->ex[4]){
		case "umode":
		case "cmode":
			include("./cmd/admin/umode.php");
			break;
		case "topic":
			include("./cmd/admin/topic.php");
			break;
		default:
			include("./cmd/admin/default.php");
			break;
	}
}else{
	$this->send_data("PRIVMSG $chan :", "You are not an admin!");
}
?>