<?php
	/**
	* Instagram feed for beginners
	*
	* @version	1.0
	* @author	Andrew Biggart
	* @link	https://github.com/andrewbiggart/php-instagram
	*
	* Notes:
	* 
	* This feed is reliant on http://followgram.me/, which takes care of that nasty API babble. So the first thing you'll need to do is register with their site and setup your username.
	*
	* Once you have registered, you'll need to change the username parameter to your selected username. You can also change the html structure and class, should you want to style it to fit your sites design.
	*
	* Next upload all files to your main directory, and then just include the file whereever you want the feed to show. (<?php include('instagram.php') ?>)
	*
	* You can also use CSS or Javascript to control the size of the images.
	* 
	*
	* Credits:
	***************************************************************************************
	* 
	* Initial idea came when I stumbled across this article by Snipplr.
	* http://snipplr.com/view/58083/
	*
	* I cleaned up the code and added caching fucntionality.
	* 
	***************************************************************************************
	*
	*
	**/
	
	function instagram($u){
		
		// Set timezone. (Modify to match your timezone) If you need help with this, you can find it here. (http://php.net/manual/en/timezones.php)
		date_default_timezone_set('Europe/London');
	
		// Function parameters.
		$limit = 10; // Limit the results (Default : 10)
		
		// Function variables.
		$ar    = array();
		$count = 0;
		$stop  = 0;
		$cache = './instagram.txt';
		$open  = '<ul class="instagram">';
		$close = '</ul>';
		
		// Seconds to cache feed (Default : 1 minute).
		$cachetime     = 60*1;
		
		// Time that the cache was last updtaed.
		$cache_created = ((file_exists($cache))) ? filemtime($cache) : 0;
 
		// A flag so we know if the feed was successfully parsed.
		$pic_found     = false;
		
		// Show cached version of pictures, if it's less than $cachetime.
		if (time() - $cachetime < $cache_created) {
	 		$pic_found = true;
			// Display pictures from the cache.
			readfile($cache);		 
		} else {
		
			$get_pics = file_get_contents("http://followgram.me/".$u."/rss");
			
			// Open html wrapper
			echo $open;
				
			// Error check: Make sure there is at least one item.
			if (count($get_pics)) {
				
				$url    = "http://followgram.me/" . $u . "/rss";
				$buffer = file_get_contents($url);
				
				// Get all the items
				preg_match_all('#<item>(.*)</item>#Us', $buffer, $items);
				
				// For each item, loop through the results
				for($i=0;$i<count($items[1]);$i++) {
					
					$item = $items[1][$i];
					
					// Define title
					preg_match_all('#<title>(.*)</title>#Us', $item, $temp);
					$title = $temp[1][0];
					
					// Define link
					preg_match_all('#<link>(.*)</link>#Us', $item, $temp);
					$link = $temp[1][0];
					
					// Define published date
					preg_match_all('#<pubDate>(.*)</pubDate>#Us', $item, $temp);
					$date = date("d-m-Y H:i:s",strtotime($temp[1][0]));
					
					// Define thumbnail url
					preg_match_all('#<img src="([^>]*)">#Us', $item, $temp);
					$thumb = $temp[1][0];
								
					echo '<li><a href="' . $link . '" title="' . $title .'" target="_blank"><img src="' . $thumb .'" alt="' . $title . ' - ' . $date . '"/></a></li>';
								
					$stop ++;
					
					// If we have processed enough pictures, stop.
					if ($stop >= $limit){
						break;
					}
 
				}
 
				// Generate a new cache file.
				$file = fopen($cache, 'w');
 
				// Save the contents of output buffer to the file, and flush the buffer. 
				fwrite($file, ob_get_contents()); 
				fclose($file); 
				ob_end_flush();
					
			}
			
			// Close html wrapper
			echo $close;
		
		}
		
	}
	
	instagram("andrew_biggart");
?>
