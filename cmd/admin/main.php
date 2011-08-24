<?php
//if($nick == "GtoXic"){
	if($this->get_level($nick) > 0){
		switch($this->ex[4]){
			case "umode":
			case "cmode":
				include("./cmd/admin/umode.php");
				break;
			case "topic":
				include("./cmd/admin/topic.php");
				break;
			case "checkinstaller":
				include("./cmd/admin/installer.php");
				break;
			case "connect":
				include("./cmd/admin/connect.php");
				break;
			case "help":
			default:
				include("./cmd/admin/default.php");
				break;
		}
	}else{
		$this->send_data("PRIVMSG $chan :", "You are not an admin!");
	}
//}else{
//	$this->send_data("PRIVMSG $chan :", "Module disabled.");
//}
?>