<?php
$topic = "";
for($i=6;$i<=count($this->ex);$i++){
	$topic .= $this->ex[$i]." ";
}
$topic = substr($topic, 1);
$this->send_data("TOPIC {$this->ex[5]} :", "$topic");
?>