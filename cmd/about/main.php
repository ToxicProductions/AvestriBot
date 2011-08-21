<?php
if(!isset($this->ex[4])){
	$this->send_data('PRIVMSG '.$chan.' :', "What would you like to know about? Modes, Version, Url, Goal");
}
if(strtolower($this->ex[4]) == "modes"){
	$this->send_data('PRIVMSG '.$chan.' :', "Modes: ~ = Bot Developers and Channel Admins | & = Bots/Bot admins and Channel Admins | @ = Bot Moderators and Channel Moderators | % = BETA testers and Channel Moderators | + = BETA Testers");
}
if(strtolower($this->ex[4]) == "version"){
	$this->send_data('PRIVMSG '.$chan.' :', "I am running version 0.1 DEVELOPMENT");
}
if(strtolower($this->ex[4]) == "url"){
	$this->send_data('PRIVMSG '.$chan.' :', "The URL for my script is http://github.com/gtoxic/avestribot");
}
if(strtolower($this->ex[4]) == "goal"){
	$this->send_data('PRIVMSG '.$chan.' :', "Our goal is to design an official AvestriForums bot that reports statuses and statistics.");
}
?>