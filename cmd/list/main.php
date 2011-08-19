<?php
$message = "";
$dirs = scandir("./cmd/", 1);
$count = count($dirs) - 2;
$i = 1;
foreach($dirs as $dir){
	if($dir != "main.php" && $dir != "." && $dir != ".."){
		$i++;
		if($i < $count){
			$message .= "$p$dir, ";
		}else{
			$message .= "$p$dir";
		}
	}
}
$this->send_data("PRIVMSG $chan :", "Commands: $message");
?>