<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/custom.css">
<link rel="stylesheet" href="../css/phone.css">
<link rel="stylesheet" href="../css/tablet.css">
<link rel="stylesheet" href="../css/small-desktop.css">
<?php
// Make sure the session is started on the hole site
session_start();
?>
<header>
<div class="navbar">
	<a class="logo" href="index">
		<img src="../images/logo.svg" alt="logo" title="SafetyUniforms.com">
		<span>SafetyUniforms.com</span>
	</a>
	<?php
	// the session that checks if the user is logged in
	    if (isset($_SESSION["userUid"])) {
			$ses = $_SESSION["userUid"]
	?>
		<nav>
		    <a href="index" title="SafetyUniforms.com">Home</a>
		    <a href="inventory" title="All stock">Inventory</a>
			<?php
			// Checks what rights the user has and displays the dashboard if the user is an admin
			    $sql = "SELECT * FROM users WHERE usersUID='$ses'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if ($row['usersRole'] == "admin") {
					echo "<a href='dashboard' title='Control panel'>Dashboard</a>";
				} else {
					
				}
			?>
		    <a href="contact" title="Contact us">Contact</a>
		    <a href="../includes/logout.inc" title="Logging out">Log out</a>
		</nav>
		<!-- This code make you able to search and filter for the articles that you want to visit -->
		<div class="search">
			<form action="search" method="POST">
				<select class="category" name="cate">
					<option value="all">All</option>
					<option value="articleCategory_A">Ambulance uniform</option>
					<option value="articleCategory_B">Fireman uniform</option>
					<option value="articleCategory_C">Police uniform</option>
					<option value="articleCategory_D">Lifeguard suit</option>
					<option value="articleCategory_E">Motorcycle suit</option>
				</select>
				<input type="text" name="search" placeholder="Search...">
				<button type="submit" name="submit-search" title="Search">Search</button>
			</form>
		</div>
		<!-- This is a special navigation for if the user visits the website from a phone or tablet -->
		<nav class="mobile-nav">
		    <a href="index" title="SafetyUniforms.com">Home</a>
		    <a href="inventory" title="All stock">Inventory</a>
			<?php
			// Checks what rights the user has and displays the dashboard if the user is an admin
			    $sql = "SELECT * FROM users WHERE usersUID='$ses'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if ($row['usersRole'] == "admin") {
					echo "<a href='dashboard' title='Control panel'>Dashboard</a>";
				} else {
					
				}
			?>
			<!-- This code make you able to search and filter for the articles that you want to visit -->
		    <a href="contact" title="Contact us">Contact</a>
		    <a href="../includes/logout.inc" title="Logging out">Log out</a>
			<div class="search">
				<form action="search" method="POST">
					<select class="category" name="cate">
						<option value="all">All</option>
						<option value="articleCategory_A">Ambulance uniform</option>
						<option value="articleCategory_B">Fireman uniform</option>
						<option value="articleCategory_C">Police uniform</option>
						<option value="articleCategory_D">Lifeguard suit</option>
						<option value="articleCategory_E">Motorcycle suit</option>
					</select>
					<input type="text" name="search" placeholder="Search...">
					<button type="submit" name="submit-search" title="Search">Search</button>
				</form>
			</div>
		</nav>
		<button class="hamburger">
			<div class="bar"></div>
		</button>
	<?php
	    } else {
	?>
	<!-- This code is for the navigation of users that are not logged in -->
		<nav>
		    <a href="index" title="SafetyUniforms.com">Home</a>
		    <a href="contact" title="Contact us">Contact</a>
			<a href="login" title="Logging in">Login</a>
		    <a href="signup" title="Signing up">Signup</a>
		</nav>
		<nav class="mobile-nav">
		    <a href="index" title="SafetyUniforms.com">Home</a>
		    <a href="contact" title="Contact us">Contact</a>
			<a href="login" title="Logging in">Login</a>
		    <a href="signup" title="Signing up">Signup</a>
		</nav>
		<button class="hamburger">
			<div class="bar"></div>
		</button>
	<?php
	    }
	?>
<!-- inclusion code for the javascript nessary to make the phone & tablet navigation work -->
<script src="../js/hamburger.js"></script>
</div>
</header>