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
			echo "Your BMI is: ".round($temp, 2);
		}
	else {
		echo "<p>BMI overview by a length of ".$height." cm</p><br><hr><br>";
		for ($weight = 40; $weight <= 150; $weight += 10) {
			$temp = $weight / (($height / 100)**2);
			if ($temp < 18.5) {
				$gewicht = "Underweight";
			} elseif ($temp >= 18.5 && $temp <= 24.9) {
				$gewicht = "Normal weight";
			} elseif ($temp >= 25 && $temp <= 29.9) {
				$gewicht = "Overweight";
			} elseif ($temp >= 30 && $temp <= 34.9) {
				$gewicht = "Obesity (grade 1)";
			} elseif ($temp >= 35 && $temp <= 39.9) {
				$gewicht = "Obesity (grade 2)";
			} elseif ($temp >= 40) {
				$gewicht = "Obesity (grade 3)";
			} else {
				$gewicht = "Unrecognized selection";
			}
			echo "<p>By a weight of ".$weight." kg your BMI is ".round($temp, 2).", $gewicht</p>";
		}
	}
}
function myEach(&$array) // Replacement for the deprecated each function
{
	$key    = key($array);
	$result = ($key === null) ? false :
						[$key, current($array), 'key', 'value' => current($array)];
	next($array);
	return $result;
}
function tree($iterations = 5) {
	ob_start();
	$width = 500;
	$height = 500;
	$image = imagecreatetruecolor($width, $height);

	// Allocate white color for background
	$backgroundColor = imagecolorallocate($image, 1, 4,9);
	imagefill($image, 0, 0, $backgroundColor);

	// Set initial square size and position
	$squareSize = $width / 8;
	$squareX = ($width - $squareSize) / 2;
	$squareY = $height - $squareSize;

	// Define colors for the square and triangle
	$squareColor = imagecolorallocate($image, 0, 255, 0);
	$triangleColor = imagecolorallocate($image, 255, 0, 0);
	
	// Draw the main square
	imagefilledrectangle($image, $squareX, $squareY, $squareX + $squareSize, $squareY + $squareSize, $squareColor);

	// Define the triangle points
	$triangleBaseMidX = $squareX + ($squareSize / 2);
	$triangleHeight = $squareSize / 2;
	$trianglePeakY = $squareY - $triangleHeight;

	// Draw the triangle
	$points = [
			$squareX, $squareY,
			$squareX + $squareSize, $squareY,
			$triangleBaseMidX, $trianglePeakY
	];
	imagefilledpolygon($image, $points, 3, $triangleColor);
	for ($i = 0; $i < $iterations; $i++) {
		// Update variables to draw the next set of shapes
		// The new square size is the height of the triangle
		$squareSize = $triangleHeight;
		// The new X-coordinate is the base middle X-coordinate of the triangle
		$squareRight = $triangleBaseMidX + ($squareSize);
		$squareLeft = $triangleBaseMidX - ($squareSize);
		// The new Y-coordinate is the peak Y-coordinate of the triangle
		// if ($i == 1) {
		// 	$squareY = $trianglePeakY - $squareSize + $squareSize;
		// } else {
		// 	$rightsquareY = $rightTrianglePeakY - $squareSize + $squareSize;
		// 	$leftsquareY = $rightTrianglePeakY - $squareSize + $squareSize;
		// }
		$squareY = $trianglePeakY - $squareSize + $squareSize;
	
		
		// Calculate and draw the diamond on the right
		$rightDiamondPoints = [
		    $squareRight, $squareY - $squareSize, // Top vertex
		    $squareRight + $squareSize, $squareY, // Right vertex
		    $squareRight, $squareY + $squareSize, // Bottom vertex
		    $squareRight - $squareSize, $squareY  // Left vertex
		];
		imagefilledpolygon($image, $rightDiamondPoints, 4, $squareColor);

		// Calculate and draw the diamond on the left
		$leftDiamondPoints = [
		    $squareLeft, $squareY - $squareSize, // Top vertex
		    $squareLeft + $squareSize, $squareY, // Right vertex
		    $squareLeft, $squareY + $squareSize, // Bottom vertex
		    $squareLeft - $squareSize, $squareY  // Left vertex
		];
		imagefilledpolygon($image, $leftDiamondPoints, 4, $squareColor);

		// For the triangle on the right diamond
		$rightTrianglePeakX = $squareRight + $squareSize; // Right base vertex of the diamond
		$rightTrianglePeakY = $squareY - ($squareSize); // Y is above the diamond

		// Draw the triangle on the right diamond
		$rightTrianglePoints = [
		    $rightTrianglePeakX, $squareY,
		    $squareRight, $squareY - $squareSize, // Adjusted to follow the diamond's slope
		    $rightTrianglePeakX, $rightTrianglePeakY
		];
		imagefilledpolygon($image, $rightTrianglePoints, 3, $triangleColor);

		// For the triangle on the left diamond
		$leftTrianglePeakX = $squareLeft - $squareSize; // Left base vertex of the diamond
		$leftTrianglePeakY = $squareY - ($squareSize); // Y is above the diamond

		// Draw the triangle on the left diamond
		$leftTrianglePoints = [
		    $leftTrianglePeakX, $squareY,
		    $squareLeft, $squareY - $squareSize, // Adjusted to follow the diamond's slope
		    $leftTrianglePeakX, $leftTrianglePeakY
		];
		imagefilledpolygon($image, $leftTrianglePoints, 3, $triangleColor);
		$triangleHeight = $squareSize;
		$triangleBaseMidX = $squareX + ($squareSize / 2);

	}

	// Output the image as JPEG
	imagejpeg($image);
	$contents = ob_get_clean();

	// Clean up and prepare the image data as base64 to embed in an HTML image tag
	imagedestroy($image);
	$imageData = 'data:image/jpeg;base64,' . base64_encode($contents);
	return $imageData;
}

?>