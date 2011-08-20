<?php
$arr = parse_ini_file("./cmd/note/notes.ini");
$message = "";
for($i=5; $i <= (count($this->ex)); $i++){
	$message .= $this->ex[$i]." ";
}

$arr[$this->ex[4]] = $message;
$this->write_php_ini($arr, "./cmd/note/notes.ini");
?>