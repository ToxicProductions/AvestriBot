<?php
if($this->get_level($nick) > 3){
	$this->char[$chan] = $this->ex[4];
	$this->send_data("Prefix changed to {$this->ex[4]}");
}else{
	$this->send_data("You are not authorised to do that.");
}
?>