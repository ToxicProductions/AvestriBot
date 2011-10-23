<?php
function read(){
	$handler = fopen("php://stdin", "r");
	$line = fgets($handler);
	return trim($line);
}
function out($msg,$die=false){
	if($die == true){
		echo($msg."\r\n");
		die();
	}else{
		echo($msg."\r\n");
	}
}
if(file_exists("../core/config.php")){
	out("Config file exists, please delete it to continue.");
}else{
	out("
		  ___    __           __    _____     _____   ____________     ______     ________        ___      ____     ____________
		 / _ \   \ \         / /   |     |   /  __/  |____    ____|   /  _   \   |__    __|      |   \    /    \   |____    ____|
		/ / \ \   \ \       / /    |   __|   \  \         |  |        | /_\  |      |  |         | | |   /   _  \       |  |
	   / /___\ \   \ \     / /     |  |__     \  \        |  |        |    __/      |  |         |___/   |  | | |       |  |
	  / _______ \   \ \   / /      |   __|     \  \       |  |        | |\ \        |  |         |   \   |  |_| |       |  |
	 / /       \ \   \ \_/ /       |  |__     __\  \      |  |        | | \ \     __|  |__       | | |   \      /       |  |
	/_/         \_\   \___/        |_____|   /_____/      |__|        |_|  \_\   |________|      |___/    \____/        |__|

												  _____          _____
												 |  _  |        |  _  |
												 | | | |        | | | |
												 | | | |        | | | |
												 | | | |        | | | |
												 | | | |        | | | |
												 | | | |        | | | |
												 | |_| |        | |_| |
												 |_____|   __   |_____|
														  |  |  
														  |  |
														  |  |
														  |  |
														  |__|
			  
			  
												 _______________________
												 \                     /
												  \                   /
												   \   ___________   /
													\  \         /  /
													 \__\_______/__/
														 \     /
														  \   /
														   \ /
															V
															
	Welcome to the AvestriBot installation! Firstly, here's a few things you
	need to know.
	bugtracking is at https://github.com/GtoXic/AvestriBot/issues/
	updates will be posted to https://github.com/GtoXic/AvestriBot/
	----
	In the installer, all default answers are CAPITALISED/CAPITALIZED like so.
	Toxic Productions does not own Avestri, they simply assist in development of the mainframe and addons like AvestriBot.
	Before installing: You must agree to these Terms and Conditions
	----
	By typing I agree you are saying that you will NOT do any of the following (but not limited to):
	Claim AvestriBot and/or it's modules as your own.
	Create modules that intend to steal peoples identity and/or details.
	Create modules that may install a virus onto the user's PC/Laptop.
	Change content that is to be left alone and then file an issue complaining.
	Create issues asking how you do something, there is a forum for that (see links above)
	Abuse the bot in any way, shape or form.
	Edit this installer and add it to the bot.

	By typing I agree you are saying that you will do the following (but not limited to):
	Report modules that are abusive/dangerous (this includes featured modules).
	Use the bot in a responsible way and not causing issues for others.
	Only allow usage of the bot's admin features by TRUSTED users.
	Will only use this for AvestriForums forums and not others (eg: phpBB, PunBB, MyBB)
	----
	Do you agree? (Type: \"I agree\" to agree or \"I disagree\" to disagree) ");
	if(strtolower(read()) == "i agree"){
		out("We request that you make a $1 donation to the Avestri development, this is optional however, would you do that for us? (Y/n)");
		if(strtolower(read()) != "n"){
			out("Right on! Goto https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ANB9YAX5XGATA and put in any amount! We request no less than $1, but please feel free to donate lower than that! Just please, don't make it stupidly low. We are non-profit, all of our projects only request donations. Also, check that the Organisation is \"Avestri\".
	----
	Press any key to continue.");
			read();
		}
		out("Welcome to the AvestriBot Installer! Do you want to continue? (Y/n) ");
		if(strtolower(read()) != "n"){
			out("OK! Firstly, what is the server IP/hostname you want to connect to? ");
			$l = read();
			if($l == ""){
				out("You never specified a server!",true);
			}else{
				out("You said \"$l\" is this correct? (y/N) ");
				if(strtolower(read()) == "y"){
					$server = $l;
					out("OK! Next, what will the port be? $server:");
					$l = read();
					if($l == ""){
						out("No port specified!",true);
					}else{
						$port = $l;
					}
					out("OK! Next, we have the channel, the format for this is #CHANNELNAME. Channel: ");
					$l = read();
					if($l == ""){
						out("No channel specified!",true);
					}else{
						$chan = $l;
					}
					out("Nice, next we have the Bot's Realname and Nickname which should be formatted as Realnick\"Nickname: ");
					$l = read();
					$l = explode("\"", $l);
					if(count($l) < 2){
						out("missing a parameter!",true);
					}else{
						$real = $l[0];
						$nick = $l[1];
					}
					out("Now I need your NickServ password to use: ");
					$l = read();
					$pass = $l;
					out("OK, now I need your nickname or the owner of the bot's nickname. This will make the user unaffected by ignores etc: ");
					$l = read();
					if($l == ""){	
						out("You need to specify an owner!",true);
					}else{
						$owner = $l;
					}
					out("-------");
					out(" MYSQL ");
					out("-------");
					out("This section is for the AvestriForums MySQL configuration.");
					out("Firstly, what is the hostname? ");
					$l = read();
					if($l == ""){
						out("No hostname specified, defaulting to localhost.");
						$mhost = "localhost";
					}else{
						$mhost = $l;
					}
					out("Next up, the port. This is normally 3306: ");
					$l = read();
					if($l == ""){
						out("No port specified, defaulting to 3306.");
						$mport = "3306";
					}else{
						$mport = $l;
					}
					out("Next is the username: ");
					$l = read();
					if($l == ""){
						out("No username specified!",true);
					}else{
						$muser = $l;
					}
					out("And now the password for that user: ");
					$l = read();
					$mpass = $l;
					out("What is the database name? ");
					$l = read();
					if($l == ""){
						out("You need to specify a database name.",true);
					}else{
						$mname = $l;
					}
					out("And last but not least, the table prefix: ");
					$l = read();
					$mpref = $l;
					out("OK, that's that done, I'm just creating the config.php for you now! If you need to change anything, goto BOTHOME/core/config.php");
					$fp = fopen("../core/config.php", "w");
					$data = "<?php
	\$config = array(
	\"server\"  => \"$server\", //Server IP/Hostname
	\"port\"    => $port, //Server Port
	\"channel\" => \"$chan\", //Channel
	\"name\"    => \"$real\", //Bot's Realname
	\"nick\"    => \"$nick\", //Bot's Nickname
	\"pass\"    => \"$pass\", //Nickserv password (if applicable)
	\"owner\"   => \"$owner\", //This is the bot owner or SuperUser which means they bypass the filters etc and do not need an admins.ini entry
	//MYSQL INFO
	\"sqlhost\" => \"$mhost\", //MySQL Server IP/Hostname
	\"sqlport\" => \"$mport\", //MySQL Port (Leave this one alone if you don't know it)
	\"sqluser\" => \"$muser\", //MySQL Username
	\"sqlpass\" => \"$mpass\", //MySQL Password - This can be empty
	\"db_name\" => \"$mname\", //MySQL Database Name
	\"db_pref\" => \"$mpref\", //MySQL Table prefix (eg: [af_]members the text in the [] been the prefix) This can be empty
	);
	?>";
					fwrite($fp, $data);
					fclose($fp);
					out("OK, that's done! Thanks for using the AvestriBot CLI Installer!");
					out("Goodbye",true);
				}
			}
		}
	}
}