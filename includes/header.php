<?php 
  require_once 'function.inc.php';
  require_once 'db.inc.php';
  session_start();  
?>
<html lang="en">
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
  <script src="js/signup.js"></script>
  <title><?php echo $pagetitle; ?></title>
</head>
<body>
  <nav>
    <p class="count">
      <?php pageCounter(); ?>
    </p>
    <div class="navbar-left">
      <img src="./images/Leo.png" alt="Logo">
    </div>
    <div class="navbar-right">
      <?php
        // The session that checks if the user is logged in
        if (isset($_SESSION["userId"])) {
            $ses = $_SESSION["userId"];
      ?>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="bmi-calculator.php">BMI Calculator</a></li>
        <li><a href="article.php">Articles</a></li>
        <li><a href="test.php">Experimentation lab</a></li>
        <li><a href="bunny.php">Bunny army</a></li>
        <li><a href="upload.php">Upload</a></li>
        <?php
            // Checks what rights the user has and displays the dashboard if the user is an admin
            $sql = "SELECT * FROM users WHERE usersID = :ses";
            $stmt = $pdo->prepare($sql);           
            $stmt->bindParam(':ses', $ses, PDO::PARAM_STR);            
            $stmt->execute();      
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['usersRole'] == "user") {
                echo "<li><a href='change_password.php?usersID=".$row["usersID"]."'>Change password</a></li>";
            } else
            if ($row['usersRole'] == "admin") {
                echo "<li><a href='dashboard.php
                ' title='Control panel'>Dashboard</a></li>";
            }
        ?>
        <li><a href="includes/logout.inc.php">Logout</a></li>
      </ul>
      <?php
        } else {
      ?>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="bmi-calculator.php">BMI Calculator</a></li>
        <li><a href="signUp.php">Sign up</a></li>
        <li><a href="logIn.php">Log in</a></li>
      </ul>
      <?php
        } 
      ?> 
    </div>
  </nav>
</body>
</html>