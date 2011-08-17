<?php
$message = "";
for($i=5; $i <= (count($this->ex)); $i++){
	$message .= $this->ex[$i]." ";
}
$this->send_data('PRIVMSG '.$this->ex[4].' :', $message);
?>