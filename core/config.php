<?php
$config = array(
"server"  => "irc.x10hosting.com", //Server IP/Hostname
"port"    => 6667, //Server Port
"channel" => "#avestri", //Channel of bot home and also for twitter tweets
"name"    => "AvestriBot", //Bot's Realname
"nick"    => "AvestriBot", //Bot's Nickname
"pass"    => "", //Nickserv password (if applicable)
"owner"   => "GtoXic", //This is the bot owner or SuperUser which means they bypass the filters etc and do not need an admins.ini entry
//MYSQL INFO
"sqlhost" => "localhost", //MySQL Server IP/Hostname
"sqlport" => "3306", //MySQL Port (Leave this one alone if you don't know it)
"sqluser" => "root", //MySQL Username
"sqlpass" => "", //MySQL Password 
"db_name" => "gothx_community", //MySQL Database Name
"db_pref" => "af_", //MySQL Table prefix (eg: [af_]members the text in the [] been the prefix) This can be empty
);
?>
