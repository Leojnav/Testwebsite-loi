<?php
  $pagetitle= "Create Article";
?>
<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<section class=bmi-b1>
  <h1>New article</h1>
  <div class='row'>
    <div class='col'>
      <form action="includes/function.inc.php" method="post">
        <label>Name</label><br>
        <input type="varchar" name="name" placeholder="name..."><br>
        <label>Price</label><br>
        <input type="float" name="price" placeholder="price..."><br>
        <button class="uk-button" type="submit" name="submit-article" title='Submit Article'>Add</button>
        <!-- Code for error and massages -->

      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>