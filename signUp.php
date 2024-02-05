<?php
  $pagetitle= "Sign up";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
?>

<section class=bmi-b1>
  <h1>Sing up</h1>
	<form action="includes/signup.inc.php" method="post">
  <div class='row'>
    <div class='col1-2'>
			<!-- All input field of the register form -->
			<label>Firstname</label><br>
				<input type="text" name="usersFirstName" placeholder="Name..."><br>
			<label>Lastname</label><br>
				<input type="text" name="usersLastname" placeholder="Lastname..."><br>
			<label>Email address</label><br>
				<input type="text" name="usersEmail" placeholder="Email..."><br>
		</div>
		<div class='col1-2'>
			<label>Username</label><br>
				<input type="varchar" name="usersUID" placeholder="Username..."><br>
			<label>Password</label>
			<!-- Code  to show what is needed for a correct password -->
			<div style="cursor:pointer;" onclick="clickToShow();">
				<input type="password" id="usersPWD" name="usersPWD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password...">
				<img src="../images/info.png" alt="Info">
				<div class="text-block" id="clickToShow" hidden> 
					<h3>Password must contain the following:</h3>
					<p>Atleast 1 <b>lowercase</b> letter</p>
					<p>Atleast 1 <b>capitalized</b> letter</p>
					<p>Atleast 1 <b>number</b></p>
					<p>Minimum of <b>8 characters</b></p>
				</div>
			</div>	
			<label>Repeat password</label><br>
				<input type="password" name="pwdrepeat" placeholder="Repeat password...">
		</div>
	</div>
	<div class='row'>
		<div class="col">
			<!-- Code for error and massages -->
			<?php
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo "<p class='errormassage'>Fill in all the fields!</p>";
				} else if ($_GET["error"] == "invaliduid") {
					echo "<p class='errormassage'>Use a uniek username!</p>";
				} else if ($_GET["error"] == "invalidemail") {
					echo "<p class='errormassage'>Use a valid Email!</p>";
				} else if ($_GET["error"] == "nomatchfound") {
					echo "<p class='errormassage'>Password need to be matching!</p>";
				} else if ($_GET["error"] == "usernametaken") {
					echo "<p class='errormassage'>Username taken!</p>";
				} else if ($_GET["error"] == "stmtfailed") {
					echo "<p class='errormassage'>Something went wrong, try again next time!</p>";
				} else if ($_GET["error"] == "none") {
					echo "<p class='errormassage'>You are registered!</p>";
				}
			}
			?>
		</div>
		<div class="col">
			<button class="uk-button" type="submit" name="submit" title="Register">Register</button>
		</div>
	</div>
	</form>
</section>


<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>