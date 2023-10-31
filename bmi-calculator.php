<?php
  $pagetitle= "Experimentation lab";
?>

<!-- Navbar & Database + other includes -->
<?php
	include 'includes/header.php';
?>

<section class=bmi-b1>
  <form action="bmi-calculator.php" method="post">
    <label for="weight">Weight in kg:</label><br>
    <input type="text" id="weight" name="weight" value=""><br>
    <label for="height">Height in cm:</label><br>
    <input type="text" id="height" name="height" value=""><br><br>
    <input class="uk-button" type="submit" value="Submit">
  </form>
</section>

<!-- Footer -->
<?php
  //include 'php/footer.php';
?>
