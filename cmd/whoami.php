<?php
$level = $this->get_level($nick);
$this->send_data('PRIVMSG '.$chan.' :', "You are $nick. Your host is $host. You are level $level");
?>