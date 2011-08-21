<?php
if(array_key_exists($chan, $this->char) == true){
	$p = $this->char[$chan];
}else{
	$p = "@";
}
if($this->get_level($nick) >= 0 || $nick == $this->config['owner']){
	switch($command){
		case "{$p}join":
			include("./cmd/join/main.php");
			break;
		case "{$p}part":
			include("./cmd/part/main.php");
			break;
		case "{$p}say":
			include("./cmd/say/main.php");
			break;
		case "{$p}restart":
			include("./cmd/restart/main.php");
			break;
		case "{$p}quit":
			include("./cmd/quit/main.php");
			break;
		case "{$p}about":
			include("./cmd/about/main.php");
			break;
		case "{$p}whoami":
			include("./cmd/whoami/main.php");
			break;
		case "{$p}forums":
			include("./cmd/forums/main.php");
			break;
		case "{$p}games":
			include("./cmd/games/main.php");
			break;
		case "{$p}list":
			include("./cmd/list/main.php");
			break;
		case "{$p}ignore":
			include("./cmd/ignore/main.php");
			break;
		case "{$p}prefix":
			include("./cmd/prefix/main.php");
			break;
		case "{$p}note":
			include("./cmd/note/main.php");
			break;
		case "{$p}admin":
			$this->error("Faulty module installation for: admin. Please read your INSTALL for troubleshooting.",3);
			$this->send_data("PRIVMSG $chan :", "Module installation faulty, please read your INSTALL for troubleshooting.");
			break;
	}
}
?>