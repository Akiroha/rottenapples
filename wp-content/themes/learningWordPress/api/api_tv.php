<?php

	$url = "http://api.tvmaze.com/schedule?country=US&date=2017-06-12";
	$json = file_get_contents($url);
	$retVal = json_decode($json, TRUE);

?>