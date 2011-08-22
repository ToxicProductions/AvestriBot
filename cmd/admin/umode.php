<?php
$modes = "";
for($i=6;$i<=count($this->ex);$i++){
	$modes .= $this->ex[$i]." ";
}
$this->send_data("MODE {$this->ex[5]} ", $modes);
?>