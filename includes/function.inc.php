<?php
function longdate($timestamp)
{
	$temp = date("l F jS Y", $timestamp);
	return "The date is $temp";
}
function pageCounter() {
	$count = isset($_COOKIE['count']) ? $_COOKIE['count'] : 0;
	echo $count;
	setcookie('count', ++$count, time() + 86400);  // Expires in 1 hour
}
function getBMI($weight,$height) {
	if ($weight !== "") {
			$temp = $weight / (($height / 100)**2);
			round($temp, 2);
			echo "Your BMI is: ".$temp;
		}
	else {
		for ($weight = 40; $weight <= 150; $weight += 10) {
			$temp = $weight / (($height / 100)**2);
			if ($temp < 18.5) {
				$gewicht = "Ondergewicht";
			} elseif ($temp >= 18.5 && $temp <= 24.9) {
				$gewicht = "Normaal gewicht";
			} elseif ($temp >= 25 && $temp <= 29.9) {
				$gewicht = "Overgewicht";
			} elseif ($temp >= 30 && $temp <= 34.9) {
				$gewicht = "Obesitas (graad 1)";
			} elseif ($temp >= 35 && $temp <= 39.9) {
				$gewicht = "Obesitas (graad 2)";
			} elseif ($temp >= 40) {
				$gewicht = "Obesitas (graad 3)";
			} else {
				$gewicht = "Unrecognized selection";
			}
			echo "<p>BIj een gewicht van ".$weight." kg is de BMI ".round($temp, 2).", $gewicht</p>";
		}
	}
}