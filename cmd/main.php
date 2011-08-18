<?php
if($this->get_level($nick) >= 0){
	switch($command){
		case '@join':
			include("./cmd/join/main.php");
			break;
		case '@part':
			include("./cmd/part/main.php");
			break;
		case '@say':
			include("./cmd/say/main.php");
			break;
		case '@restart':
			include("./cmd/restart/main.php");
			break;
		case '@quit':
			include("./cmd/quit/main.php");
			break;
		case '@about':
			include("./cmd/about/main.php");
			break;
		case '@whoami':
			include("./cmd/whoami/main.php");
			break;
		case '@forums':
			include("./cmd/forums/main.php");
			break;
	}
}
?>