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
// function tree() {
// 	ob_start();
// 	$width = 500;
// 	$height = 500;
// 	$image = imagecreatetruecolor($width, $height);

// 	// Allocate white color for background
// 	$backgroundColor = imagecolorallocate($image, 255, 255, 255);
// 	imagefill($image, 0, 0, $backgroundColor);

// 	// Define square size and position
// 	$squareSize = $width / 8; // Size of the square
// 	$squareX = ($width - $squareSize) / 2; // X-coordinate to center the square
// 	$squareY = ($height - $squareSize); // Y-coordinate to bottom the square

// 	// Define colors for the square and triangle
// 	$squareColor = imagecolorallocate($image, 0, 255, 0); // Green color for the square
// 	$triangleColor = imagecolorallocate($image, 255, 0, 0); // Red color for the triangle

// 	// Draw the main square
// 	imagefilledrectangle($image, $squareX, $squareY, $squareX + $squareSize, $squareY + $squareSize, $squareColor);
// 	// Define the triangle points
// 	$triangleBaseMidX = $squareX + ($squareSize / 2); // X-coordinate of the midpoint of the square's top side
// 	$triangleHeight = $squareSize / 2; // Height of the triangle
// 	$trianglePeakY = $squareY - $triangleHeight; // Y-coordinate for the peak of the triangle

// 	// Draw the triangle
// 	$points = [
// 			$squareX, $squareY,                          // Point A: Top left of the square
// 			$squareX + $squareSize, $squareY,            // Point B: Top right of the square
// 			$triangleBaseMidX, $trianglePeakY            // Point C: Peak of the triangle
// 	];
// 	imagefilledpolygon($image, $points, 3, $triangleColor);
// 	// Draw smaller squares on the sides of the triangle
// 	$squareSize = $squareSize / 2; // Half the size of the original square

// 	// Calculate midpoint for AC and BC segments to position the smaller squares
// 	$SquareCenterAE_X = ($points[4] + $points[0]) / 2;
// 	$SquareCenterAE_Y = ($points[1] + $points[3]) / 2;
	
// 	$SquareCenterBE_X = ($points[4] + $points[2]) / 2;
// 	$SquareCenterBE_Y = ($points[1] + $points[3]) / 2;

// 	// The bottom corners of the smaller squares are offset by half of their size from the center
// 	$SquareBottomCornerAE_X = $SquareCenterAE_X - ($squareSize / 2);
// 	$SquareBottomCornerBE_X = $SquareCenterBE_X + ($squareSize / 2);

// 	// Calculate the points of the rotated smaller squares
// 	// The squares are rotated 45 degrees, so we need to calculate the points accordingly
// 	$SquareAE = [
//     $SquareBottomCornerAE_X, $SquareCenterAE_Y,  // right corner of the diamond
//     $SquareBottomCornerAE_X - $squareSize, $SquareCenterAE_Y - $squareSize,  // Left corner of the diamond
//     $SquareBottomCornerAE_X, $SquareCenterAE_Y - ($squareSize * 2),  // Top corner of the diamond
//     $SquareBottomCornerAE_X + $squareSize, $SquareCenterAE_Y - $squareSize   // Right corner of the diamond
// ];
// 	$SquareBE = [
//     $SquareBottomCornerBE_X, $SquareCenterBE_Y,  // right corner of the diamond
//     $SquareBottomCornerBE_X + $squareSize, $SquareCenterBE_Y - $squareSize,  // Left corner of the diamond
//     $SquareBottomCornerBE_X, $SquareCenterBE_Y - ($squareSize * 2),  // Top corner of the diamond
//     $SquareBottomCornerBE_X - $squareSize, $SquareCenterBE_Y - $squareSize   // Right corner of the diamond
// 	];

// 	// Draw the smaller squares
// 		imagefilledpolygon($image, $SquareAE, 4, $squareColor);
// 		imagefilledpolygon($image, $SquareBE, 4, $squareColor);
// 	// Output the image as JPEG
// 	imagejpeg($image);
// 	$contents = ob_get_clean();   

// 	// Clean up and prepare the image data as base64 to embed in an HTML image tag
// 	imagedestroy($image);
// 	$imageData = 'data:image/jpeg;base64,' . base64_encode($contents);
// 	return $imageData;
// }
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
		$squareY = $trianglePeakY - $squareSize + $squareSize;
		
		// Size of the diamond is the same as the square size
		$halfDiagonal = $squareSize;

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
		$rightTriangleBaseX1 = $squareRight + $halfDiagonal; // Right base vertex of the diamond
		$rightTriangleBaseX2 = $squareRight; // Top vertex of the diamond
		$rightTriangleBaseY = $squareY; // Y position is the same for right base and top vertex of the diamond
		$rightTrianglePeakX =  $rightTriangleBaseX1; // Midpoint X
		$rightTrianglePeakY = $squareY - ($halfDiagonal); // Y is above the diamond

		// Draw the triangle on the right diamond
		$rightTrianglePoints = [
		    $rightTriangleBaseX1, $rightTriangleBaseY,
		    $rightTriangleBaseX2, $rightTriangleBaseY - $halfDiagonal, // Adjusted to follow the diamond's slope
		    $rightTrianglePeakX, $rightTrianglePeakY
		];
		imagefilledpolygon($image, $rightTrianglePoints, 3, $triangleColor);

		// For the triangle on the left diamond
		$leftTriangleBaseX1 = $squareLeft - $halfDiagonal; // Left base vertex of the diamond
		$leftTriangleBaseX2 = $squareLeft; // Top vertex of the diamond
		$leftTriangleBaseY = $squareY; // Y position is the same for left base and top vertex of the diamond
		$leftTrianglePeakX = ($leftTriangleBaseX1) ; // Midpoint X
		$leftTrianglePeakY = $squareY - ($halfDiagonal); // Y is above the diamond

		// Draw the triangle on the left diamond
		$leftTrianglePoints = [
		    $leftTriangleBaseX1, $leftTriangleBaseY,
		    $leftTriangleBaseX2, $leftTriangleBaseY - $halfDiagonal, // Adjusted to follow the diamond's slope
		    $leftTrianglePeakX, $leftTrianglePeakY
		];
		imagefilledpolygon($image, $leftTrianglePoints, 3, $triangleColor);
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