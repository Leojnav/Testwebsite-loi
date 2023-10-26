<?php
function longdate($timestamp)
{
	$temp = date("l F jS Y", $timestamp);
	return "The date is $temp";
}
function test()
{
	static $count = 0;
	echo $count;
	$count++;
}
function pageCounter() {
	$count = isset($_COOKIE['count']) ? $_COOKIE['count'] : 0;
	echo $count;
	setcookie('count', ++$count, time() + 86400);  // Expires in 1 hour
}