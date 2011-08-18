<?php
$data = fgets($this->socket, 256);
echo($data);
flush();
$this->ex = explode(" ", $data);
if($this->ex[0] == "PING"){
	$this->send_data("PONG ", $this->ex[1]);
}
$nick = explode("!", $this->ex[0]);
$host = $nick[1];
$host = explode(" ", $host);
$host = $host[0];
$nick = substr($nick[0],1);
$chan = $this->ex[2];
$fp = fopen("./$chan.log", "a");
fwrite($fp, $data);
fclose($fp);
$command = str_replace(array(chr(10), chr(13)), "", $this->ex[3]);
$command = substr($command, 1);
include("./cmd/main.php");
?>