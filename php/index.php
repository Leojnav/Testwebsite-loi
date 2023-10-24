<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Protective and save uniforms - SafetyUniforms.com</title>
    <meta name="description" content="The purpose of SafetyUniforms.com is to make the best protective and save uniforms in a sustainable way for all sports, businesses and work environments.">
    <meta name="keywords" content="Save, protective, uniforms, sports, work, environment, sustainable, best, quality, association, tested, protection, clothes, sustainable, good, safety, association, sustainability, SafetyUniforms, shop, comfortable, store">
    <meta name="Author" content="Joël van Sandijk">
</head>

<body>
<!-- Navbar & Database + other includes -->
<?php
include '../includes/db.inc.php';
include 'header.php';
include '../includes/functions.inc.php';
?>
<div class="container">
    <div class="home">
        <div class="divider"></div>
        <div class="blok1">
            <div class="col">
                <h1>SafetyUniforms.com</h1>
                <p>For the best uniforms</p>
                <?php
                // Code to check if the user is logged in and display a welcome message if they are
                if (isset($_SESSION["userUid"])) {
                ?>
                    <?php echo "<h2 class='loged-in'>Welcome ".$row['usersFirstName']." to the website!</h2>";?>
                    <a href="inventory" title="inventory">View or stock!</a>
                <?php
                } else {
                ?>
                    <h2>Log in now to see what's in stock!</h2>
                    <a href="login" title="Loginform">Log in!</a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="divider"></div>
        <div class="blok2">
            <div class="col">
                <img src="../images/duurzaam.svg" alt="sustainability" title="sustainability">
                <p>Clothes made in sustainable ways!</p>
            </div>
            <div class="col">
                <img src="../images/zekerheid-garantie.svg" alt="protective" title="protective">
                <p>Good quality for the best protection!</p>
            </div>
            <div class="col">
                <img src="../images/betrokken.svg" alt="Safety" title="Safety">
                <p>Tested best by the safety association!</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="blok3">
            <div class="col">
                <img src='../images/shop.jpg' alt="SafetyUniforms shop" title="SafetyUniforms shop">
            </div>
            <div class="col">
                <h1>Shops & services</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="blok4">
            <div class="col">
                <h1>Producting</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col">
                <img src='../images/shop.jpg' alt="SafetyUniforms shop" title="SafetyUniforms shop">
            </div> 
        </div>
        <div class="divider"></div>
    </div>
</div>
<!-- Footer -->
<?php
    include 'footer.php';
?>
</body>
</html>