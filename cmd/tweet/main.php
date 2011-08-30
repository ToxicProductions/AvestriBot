<?php
echo("loaded");
try{
	// get raw data as a string
	$xml_data = file_get_contents("http://search.twitter.com/search.atom?q=avestribot");

	if(strlen($xml_data) < 25){
		// Not enough data
		throw new Exception("No tweets right now.");
	}

	$doc = new DOMDocument();
	$doc->preserveWhiteSpace = false;
	if( ! $doc->loadXML($xml_data) ){
		// Failed Loading XML Doc
		throw new Exception("No tweets right now.");
	}

	$array = array();

	// Get Tweets
	$entries = $doc->getElementsByTagName("entry");

	// display 5 tweets at max
	$max = 1;
	if($entries){
		foreach($entries as $node){
			// parse out different XML elements for each tweet

			$tags = $node->getElementsByTagName("name"); // Username who wrote the tweet
			$name = $tags->item(0)->nodeValue;
			$tags = $node->getElementsByTagName("title"); // Title is the raw tweet without any HTML anchor tags
			$title = $tags->item(0)->nodeValue;
			if($this->latesttweet == $title){
				throw new Exception("No new tweets");
			}else{
				$this->latesttweet = $title;
			}
			$tags = $node->getElementsByTagName("content"); // Content is the tweet with HTML anchor tags applied
			$content = $tags->item(0)->nodeValue;
			$tags = $node->getElementsByTagName("link");
			$link = $tags->item(0)->nodeValue; // a link to the tweet
			$tags = $node->getElementsByTagName("published");
			$date = $tags->item(0)->nodeValue;
			$date = date("d M Y",strtotime($date));

			$this->send_data("PRIVMSG $chan :", "New tweet. $date - $title - By $name");

			if(--$max <= 0){
				break;
			}

		}
	}
	}catch(Exception $e){
		echo $e->getMessage();
	}
?>