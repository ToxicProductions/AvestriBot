<?php
print_r(exec("cd C:\Documents and Settings\John Samual\AvestriBot"));
print_r(exec("git add *"));
print_r(exec("git commit -m \"AvestriBot Automated Commiter\""));
print_r(exec("git push origin master"));
$this->send_data("PRIVMSG $chan", "Sent data!");
?>