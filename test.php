<!DOCTYPE html>
<html lang="en">
  <?php
    $pagetitle= "Experimentation lab";
  ?>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="manifest" href="images/site.webmanifest">
  <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#b55bd5">
  <meta name="msapplication-TileColor" content="#9f00a7">
  <meta name="theme-color" content="#fff">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/custom.css">
  <title><?php echo $pagetitle; ?></title>
</head>

<body>
<!-- Navbar & Database + other includes -->
<nav>
	<?php
		include 'includes/header.php';
	?>
</nav>
<section class=home-b1>
<?php
  $mycounter = 1;
  $mystring  = "Hello";
  $myarray   = array("One", "Two", "Three");
  echo $mycounter."<br>".$mystring."<br>".$myarray[0]."<br>";
  $oxo = array(array('x', ' ', 'o'),
               array('o', 'o', 'x'),
               array('x', 'o', ' '));
  
  echo $oxo[2][0];
if ($hour > 12 && $hour < 14) ;
$x = 9;
$y = 1;
if (++$x == 10) echo $x;
if (--$y ==0) echo $y;
  $author = "Scott Adams";
  $out = <<<_END
    Normal people believe that if it ain’t broke, don’t fix it.
  Engineers believe that if it ain’t broke, it doesn’t have enough
  features yet.
  - $author.
_END;
echo $out;
?>
<br>
<?php 
  $number = 12345 * 67890;
  echo substr($number, 0, 4);
  $enough = $fuel <= 1 ? FALSE : TRUE;
  echo $fuel <= 1 ? "Fill tank now" : "There's enough fuel";
  echo longdate(time());
  echo longdate(time() - 7 * 24 * 60 * 60);
  $came_from = htmlentities($_SERVER['HTTP_REFERER']);
  echo __FILE__;
  echo $red;
  echo "a: [" . (20 > 9) . "]<br>";
  echo "b: [" . (5 == 6) . "]<br>";
  echo "c: [" . (1 == 0) . "]<br>";
  echo "d: [" . (1 == 1) . "]<br>";
  echo "d: [" . (12 ^ 8) . "]<br>";
  $a = 2; $b = 0;
  if ($a > $b)  echo "$a is greater than $b<br>";
  if ($a < $b)  echo "$a is less than $b<br>";
  if ($a >= $b) echo "$a is greater than or equal to $b<br>";
  if ($a <= $b) echo "$a is less than or equal to $b<br>";
  $page = "test";
  switch ($page) {
  	case "Home":  echo "You selected Home";
  		break;
  	case "About": echo "You selected About";
  		break;
  	case "News":  echo "You selected News";
  		break;
  	case "Login": echo "You selected Login";
  		break;
  	case "Links": echo "You selected Links";
  		break;
    default:
	    echo "Unrecognized selection";
		break;
  }
  $count = 0;
  // while (++$count <= 12)
	// echo "$count times 12 is " . $count * 12 . "<br>";
  // do {
  //   echo "$count times 12 is " . $count * 12;
  //   echo "<br>";
  //   } while (++$count <= 12);
  for ($count = 1 ; $count <= 12 ; ++$count){
  	echo "$count times 12 is " . $count * 12;
  	echo "<br>";
    if (!$count) break;
  }
?>
</section>
<!-- Footer -->
<footer>
	<?php
	  //include 'php/footer.php';
	?>
</footer>
</body>
</html>