<!DOCTYPE html>
<html lang="en">
<?php  
$pagetitle = "Hello World!";
$fullname = <<<_END
  Joël van Sandijk
_END;
$age = <<<_END
  20 
_END;
$pets = <<<_END
  2 Cats of almost 1 year old and a dog whose age I don't know. 
_END;
$hobby = <<<_END
  playing games, watching movies and series, listening to music and programming.
_END;
$country = <<<_END
  The Netherlands
_END;
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
<h1>
  <?php echo $pagetitle; ?>
</h1><br>
<h3>
  <?php echo "My name is ".$fullname."."; ?>
</h3><br>
<p>
  <?php echo "Today i will tell you a little about my self. I am ".$age." years old. And i live in the ".$country.". At home i have ".$pets." And my hobby's are ".$hobby; ?>
</p>





</section>
<!-- Footer -->
<footer>
	<?php
	  //include 'php/footer.php';
	?>
</footer>
</body>
</html>