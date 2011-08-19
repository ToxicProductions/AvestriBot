<?php
if($this->ex[4] == "roulette"){
	include("./cmd/games/roulette.php");
}else{
	$this->send_data("PRIVMSG $chan :", "The game you specified is incorrect.");
}
?>