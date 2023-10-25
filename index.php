<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Testsite.nl</title>
</head>

<body>
<!-- Navbar & Database + other includes -->
<nav>
	<?php
		include 'php/header.php';
	?>
</nav>
<section>
<?php
  $mycounter = 1;
  $mystring  = "Hello";
  $myarray   = array("One", "Two", "Three");
  echo $mycounter."<br>".$mystring."<br>".$myarray[0]."<br>";
?>
<?php
  $oxo = array(array('x', ' ', 'o'),
               array('o', 'o', 'x'),
               array('x', 'o', ' '));
  
  echo $oxo[2][0];
?>
<?php 
$j = 5;	
//echo $j + 99;
//echo $j - 99;
//echo $j * 9;
//echo $j / 99;
echo $j % 10;
//echo ++$j;
//echo --$j;
//echo $j ** 99;

//echo $j /= 99;
//echo $j - 99;
//echo $j * 9;
//echo $j / 99;
//echo $j % 29;
//echo ++$j;
//echo --$j;
//echo $j ** 99;
?>
</section>
<!-- Footer -->
<footer>
	<?php
	  include 'php/footer.php';
	?>
</footer>
</body>
</html>