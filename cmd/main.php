<?php
error_reporting("E_ALL");
$module = "";
if(array_key_exists($chan, $this->char) == true && $chan != "#avestri"){
	$p = $this->char[$chan];
}else{
	$p = "@"; //Change this if you want the default prefix to be different to @
}
if($this->get_level($nick) >= 0 || $nick == $this->config['owner']){
	switch($command){
		case "{$p}join":
			$module = "join";
			include("./cmd/join/main.php");
			break;
		case "{$p}part":
			$module = "part";
			include("./cmd/part/main.php");
			break;
		case "{$p}say":
			$module = "say";
			include("./cmd/say/main.php");
			break;
		case "{$p}restart":
			$module = "restart";
			include("./cmd/restart/main.php");
			break;
		case "{$p}quit":
			$module = "quit";
			include("./cmd/quit/main.php");
			break;
		case "{$p}about":
			$module = "about";
			include("./cmd/about/main.php");
			break;
		case "{$p}whoami":
			$module = "whoami";
			include("./cmd/whoami/main.php");
			break;
		case "{$p}forums":
			$module = "forums";
			include("./cmd/forums/main.php");
			break;
		case "{$p}games":
			$module = "games";
			include("./cmd/games/main.php");
			break;
		case "{$p}list":
			$module = "list";
			include("./cmd/list/main.php");
			break;
		case "{$p}ignore":
			$module = "ignore";
			include("./cmd/ignore/main.php");
			break;
		case "{$p}prefix":
			$module = "prefix";
			include("./cmd/prefix/main.php");
			break;
		case "{$p}note":
			$module = "note";
			include("./cmd/note/main.php");
			break;
		case "{$p}admin":
			$module = "admin";
			include("./cmd/admin/main.php");
			break;
		case "{$p}act":
			$module = "act";
			include("./cmd/act/main.php");
			break;
		case "{$p}tweet":
			$module = "tweet";
			echo("tweetbot loaded");
			include("./cmd/tweet/main.php");
			break;
	}
}
?>