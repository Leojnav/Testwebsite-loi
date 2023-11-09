<?php
  $pagetitle= "Experimentation lab";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
?>

<section class=bmi-b1>
  <h1>Body Mass Index (BMI) calculator</h1>
  <p>To calculate your BMI you can either put in both your weight and height or only your height.</p>
  <div class='row'>
    <div class='col1-3'>
      <form action="" method="post">
        <label for="weight">Weight in kg:</label><br>
        <input type="number" id="weight" name="weight"><br>
        <label for="height"><span>*</span> Height in cm:</label><br>
        <input type="number" id="height" name="height" required oninvalid="this.setCustomValidity('Only this field is required for the BMI calculation!')"><br>
        <input class="uk-button" type="submit" name="bmi-calculator" value="Submit">
      </form>
    </div>
    <div class='col2-3'>
      <ul>
        <li><p>Underweight: Less then 18.5</p></li>
        <li><p>Normal weight: 18.5 - 24.9</p></li>
        <li><p>Overweight: 25 - 29.9</p></li>
        <li><p>Obesity (grade 1): 30 - 34.9</p></li>
        <li><p>Obesity (grade 2): 35 - 39.9</p></li>
        <li><p>Obesity (grade 3): 40 or higher</p></li>
      </ul>
    </div>
  </div>
</section>
<section class=bmi-b1>
  <div class='row'>
    <div class='col'>
    <h3>The results are:</h3>
    <?php
      if (isset($_POST['bmi-calculator'])) {
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bmi = getBMI($weight, $height);
        echo $bmi;
      }
    ?>
  </div>
</section>


<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>
