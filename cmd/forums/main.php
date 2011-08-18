<?php
$q = mysql_query("SELECT * FROM `{$config['db_pref']}forums`");
$this->send_data("PRIVMSG $chan :", "There are ".mysql_num_rows($q)." forums currently.");
?>