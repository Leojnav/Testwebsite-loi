<?php
  $pagetitle= "Dashboard";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  $id = $_GET['usersID'];
  if (count($_POST) > 0) {
    $sql = "UPDATE users SET usersFirstName=?, usersLastname=?, usersEmail=?, usersUID=?, usersPWD=?, pwdrepeat=?, usersRole=? WHERE usersID=?";
    $stmt = $pdo->prepare($sql);
  
    try {
      $stmt->execute([$_POST['usersFirstName'], $_POST['usersLastname'], $_POST['usersEmail'], $_POST['usersUID'], $_POST['usersPWD'], $_POST['pwdrepeat'], $_POST['usersRole'], $id]);
      header("Location: dashboard.php?error=edit");
      exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
  
  $sql = "SELECT * FROM users WHERE usersID=?";
  $stmt = $pdo->prepare($sql);
  
  try {
      $stmt->execute([$id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
?>

<section class=bmi-b1>
  <h1 style="margin-bottom: 50px; text-align:center;">Administratie</h1>
  <div class='row60'>
  <h1>Users table</h1>
    <div class='col'>
      <table>
        <tr>
          <td>
            <!-- This is the beginning of the form content -->
            <form action="includes/dashboard.inc.php" method="post" style="margin-right: 50px; padding-top:0px;">
              <label>Firstname</label><br>
                <input type="text" name="usersFirstName" value="<?php echo $row['usersFirstName'] ?? ''; ?>">
              <label>Lastname</label><br>
                <input type="text" name="usersLastname" value="<?php echo $row['usersLastname']?? ''; ?>">
              <label>Email address</label><br>
                <input type="text" name="usersEmail" value="<?php echo $row['usersEmail']?? ''; ?>">
              <label>Username</label><br>
                <input type="varchar" name="usersUID" value="<?php echo $row['usersUID']?? ''; ?>">
              <label>Password</label><br>
                <input type="password" name="usersPWD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
              <label>Repeat password</label><br>
                <input type="password" name="pwdrepeat" >
              <label>User Role</label><br>
              <select class="uk-button" style="margin-top: 5px;" name="usersRole">
			        	<option value="klant">Klant</option>
			        	<option value="admin">Admin</option>
			        </select><br>
              <button class="uk-button" style="margin-top: 25px;" title="Submit edit" type="submit" name="submit-edit">Add</button>
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
            </form>
          </td>
          <td>
            <!-- This is the code for showing the table that can be worked on -->
            <table>
              <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Username</th>
                <th>User Role</th>
                <th>Date</th>
                <th>Options</th>
              </tr>
              <?php
              // Code to show the database table
                $sql ="SELECT * FROM users ORDER BY usersFirstName ASC;";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>".$row["usersID"]."</td><td>".$row["usersFirstName"]."</td>
                    <td>".$row["usersLastname"]."</td><td>".$row["usersEmail"]."</td>
                    <td>".$row["usersUID"]."</td>
                    <td>".$row["usersRole"]."</td><td>".$row["timeCreated"]."</td>
                    <td>
                    <a title='Delete' class='delete' href='includes/delete.php?usersID=".$row["usersID"]."'>Delete</a>
                    <a title='Edit' class='edit' href='dashboard.php?usersID=".$row["usersID"]."'>Edit</a>
                    </td></tr>";
                  }
                  echo "</table>";
                }
                else {
                  echo "0 results";
                }
              ?>
            </table>     
          </td>
        </tr>
      </table>
		</div>
  </div>
</section>
