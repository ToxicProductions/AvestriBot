<?php
switch($command){
	case '@join':
		include("./cmd/join.php");
		break;
	case '@part':
		include("./cmd/part.php");
		break;
	case '@say':
		include("./cmd/say.php");
		break;
	case '@restart':
		include("./cmd/restart.php");
		break;
	case '@quit':
		include("./cmd/quit.php");
		break;
	case '@about':
		include("./cmd/about.php");
		break;
}
?>