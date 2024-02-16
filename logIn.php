<?php
  $pagetitle= "Log in";
	error_reporting(0);
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
	if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
    header('Location: index.php');
    exit;
  }
?>

<section class=bmi-b1>
  <h1>Login</h1>
	<form action="includes/login.inc.php" method="post">
  <div class='row20'>
    <div class='col'>
			<label>Email Address or Username</label><br>
			<input type="text" name="usersUID" placeholder="Email/Username..."><br>
			<label>Password</label><br>
			<input type="password" name="usersPWD" placeholder="Password..."><br>
			<!-- Code for error and massages -->
			<?php
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo "<p class='errormassage'>Fill in all the fields!</p>";
				} else if ($_GET["error"] == "wronglogin") {
					echo "<p class='errormassage'>Wrong username/Email!</p>";
				}
			}
			?>
			<div class="col3">
				<button class="uk-button"type="submit" name="submit" title="Login">Login</button>
			</div>
				</form>
		</div>
	</div>
	</form>
</section>
<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>