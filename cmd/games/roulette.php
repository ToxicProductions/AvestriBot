<?php
print_r($this->ex);
if($this->ex[5] == "reload"){
	$this->gun[1] = 1;
	$this->gun[2] = 1;
	$this->gun[3] = 1;
	$this->gun[4] = 1;
	$this->gun[5] = 1;
	$this->gun[6] = 1;
	$this->send_data("PRIVMSG $chan :", "Reloaded!");
}elseif($this->ex[5] == "fire"){
	$c = rand(0,10);
	$empties = 0;
	$x = 6;
	for($i=1;$i<=$x;$i++){
		if($this->gun[$i] == 0){
			$empties++;
		}
	}
	if($c < 5 && $empties < 6){
		$this->send_data("PRIVMSG $chan ", ":The round was a blank.");
		$r = $empties + 1;
		$this->gun[$r] = 0;
	}elseif($empties < 6){
		$this->send_data("PRIVMSG $chan ", ":The round was live! You are dead!");
		$r = $empties + 1;
		$this->gun[$r] = 0;
	}else{
		$this->send_data("PRIVMSG $chan ", ":The Magazine is emtpy, please reload.");
	}
}
?>