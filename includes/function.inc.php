<?php
require_once 'db.inc.php';
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



if (isset($_POST["submit-article"])) {
	include 'db.inc.php';

	$name = $_POST["name"];
	$price = $_POST["price"];
	$sql = "INSERT INTO article (name, price) VALUES (?,?)";
	$stmt = $pdo->prepare($sql);
try {
    $stmt->execute([$name, $price]);
    header("Location: ../article.php?error=none");
		exit();
} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        // Duplicate entry error
        header("Location: ../article.php?error=duplicate");
        exit();
    } else {
			header("Location: ../article.php?error=unknown");
			exit();
    }
}
}
$tableName = 'users';
$tableExists = false;

try {
  // Check if table exists
  $query = $pdo->query("SHOW TABLES LIKE '{$tableName}'");
  if ($query->rowCount() > 0) {
      $tableExists = true;
  }
  
  // If table exists, check if all columns exist and match the specified definitions
  if ($tableExists === false) {
		recreateTable($pdo, $tableName);
		insertdata($pdo);
		echo "Table created";
	} 
//  else {
// 	echo "Table already exists";
// }
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
		
// User table does not exist, create it
function recreateTable($pdo, $tableName) {
	$createTableSQL = "CREATE TABLE `{$tableName}` (
			`usersID` INT AUTO_INCREMENT PRIMARY KEY,
			`usersFirstName` varchar(32) NOT NULL,
			`usersLastname` varchar(32) NOT NULL,
			`usersEmail` varchar(32) NOT NULL,
			`usersPWD` varchar(64) NOT NULL,
			`usersUID` varchar(32) NOT NULL,
			`usersRole` varchar(32) NOT NULL,
			`timeCreated` datetime DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
	$pdo->exec($createTableSQL);
	$alterTableSQL = "ALTER TABLE `{$tableName}` AUTO_INCREMENT=3;";
	$pdo->exec($alterTableSQL);
}
function insertdata($pdo) {
	$sql = 'INSERT INTO `users` (`usersID`, `usersFirstName`, `usersLastname`, `usersEmail`, `usersPWD`, `usersUID`, `usersRole`, `timeCreated`) VALUES ' .
	"(1, 'test', 'test', 'test@test.nl', '\$2y\$10\$597InkN860VRm50rmV8H/.Vc73j6UGN5hZse67qXrwIljdoETGerO', 'test', 'user', '2024-01-26 15:01:07'), " .
	"(2, 'joel', 'joel', 'joel@joel.nl', '\$2y\$10\$zs0l2xTSUlPkH9wFtAZig.IDvtYZ9khkdQKLj6o7Gtpuhn1djDu12', 'joel', 'admin', '2024-01-26 15:29:53');";
	$pdo->exec($sql);
}
//This function check if none of the field are empty in the signup form for the administrator
function emptyInputDashboard($name, $lastname, $email, $username, $pwd, $pwdRepeat, $role)
{
    if (empty($name) || empty($lastname) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($role)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if none of the field are empty in the signup form
function emptyInputSignup($name, $lastname, $email, $username, $pwd, $pwdRepeat)
{
    if (empty($name) || empty($lastname) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if the username is valid and not taken
function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if the email is valid and not taken
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if the password and password repeat are the same
function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if the username or email is already taken
function uidExists($pdo, $username, $email)
{
  $sql = "SELECT * FROM users WHERE usersUID = :username OR usersEmail = :email;";
  try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    } else {
        return false;
    }
  } catch (PDOException $e) {
    if (isset($_POST["submit-signup"])) {
        header("location: ../php/dashboard?error=stmtfailed");
        exit();
    }
    if (isset($_POST["submit"])){
        header("location: ../signUp.php?error=stmtfailed");
        exit();
    }
  }
}
//This function inserts content from the signup form into the database
function createUser($pdo, $name, $lastname, $email, $username, $pwd, $role, $date){
  $sql = "INSERT INTO users (usersFirstName, usersLastname, usersEmail, usersUID, usersPWD, usersRole, timeCreated) VALUES (:name, :lastname, :email, :username, :pwd, :role, :date);";
  try {
    $stmt = $pdo->prepare($sql);
    $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $pwdHashed, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->execute();
  } catch (PDOException $e) {
    if (isset($_POST["submit-adduser"])) {
      header("location: ../dashboard.php?error=stmtfailed");
      exit();
    }
    if (isset($_POST["submit-signup"])){
      header("location: ../signUp.php?error=stmtfailed");
      exit();
    }
  }
  if (isset($_POST["submit-adduser"])) {
    header("location: ../dashboard.php");
  }
  if (isset($_POST["submit-signup"])){
    header("location: ../signUp.php?error=none");
  }
  exit();
}
//This function check if none of the field are empty in the login form
function emptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//This function check if the username and password are correct
function loginUser($pdo, $username, $pwd)
{
    $uidExists = uidExists($pdo, $username, $username);

    if ($uidExists === false) {
        header("location: ./logIn.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPWD"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: /logIn.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
				$_SESSION["loggedin"] = true; // Indicate that the user is logged in.
        $_SESSION["userId"] = $uidExists["usersID"];
        $_SESSION["userUid"] = $uidExists["usersUID"];;
        header("location: ../index.php");
        exit();
    }
}
?>