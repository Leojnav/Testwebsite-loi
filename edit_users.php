<?php
  $pagetitle= "Edit users";
?>
<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  $id = $_GET['usersID'];

    if (count($_POST) > 0) {
    $hashedPwd = null;
    if (!empty($_POST['usersPWD']) && !empty($_POST['pwdrepeat']) && $_POST['usersPWD'] == $_POST['pwdrepeat']) {
      $hashedPwd = password_hash($_POST['usersPWD'], PASSWORD_DEFAULT);
    }
    $sql = "UPDATE users SET usersFirstName=?, usersLastname=?, usersEmail=?, usersUID=?, usersRole=?".($hashedPwd ? ", usersPWD=?" : "")." WHERE usersID=?";
    $stmt = $pdo->prepare($sql);
    $params = [$_POST['usersFirstName'], $_POST['usersLastname'], $_POST['usersEmail'], $_POST['usersUID'], $_POST['usersRole']];
    if ($hashedPwd) {
        $params[] = $hashedPwd;
    }
    $params[] = $id;
    try {
      $stmt->execute($params);
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
      if (emptyInputSignup($name, $lastname, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: /edit_users.php?error=emptyinput");
        exit();
      }
      if (invalidUid($username) !== false) {
        header("location: /edit_users.php?error=invaliduid");
        exit();
      }
      if (invalidEmail($email) !== false) {
        header("location: /edit_users.php?error=invalidemail");
        exit();
      }
      if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: /edit_users.php?error=nomatchfound");
        exit();
      }
      if (uidExists($pdo, $username, $email) !== false) {
        header("location: /edit_users.php?error=usernametaken");
        exit();
      }
  }
?>

<section class=bmi-b1>
  <h1 style="margin-bottom: 50px; text-align:center;">Administratie</h1>
  <div class='row60'>
    <div class='col' style="display: flex; justify-content: center;">
      <table>
        <tr>
          <td>
            <!-- This is the beginning of the form content -->
            <form action="" method="post" style="margin-right: 50px; padding-top:0px;">
              <label>Firstname</label><br>
                <input type="text" name="usersFirstName" value="<?php echo $row['usersFirstName'] ?? ''; ?>"><br>
              <label>Lastname</label><br>
                <input type="text" name="usersLastname" value="<?php echo $row['usersLastname']?? ''; ?>"><br>
              <label>Email address</label><br>
                <input type="text" name="usersEmail" value="<?php echo $row['usersEmail']?? ''; ?>"><br>
              <label>Username</label><br>
                <input type="varchar" name="usersUID" value="<?php echo $row['usersUID']?? ''; ?>"><br>
              <label>Password</label><br>
                <input type="password" name="usersPWD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
              <label>Repeat password</label><br>
                <input type="password" name="pwdrepeat"><br>
              <label>User Role</label><br>
              <select class="uk-button" style="margin-top: 5px;" name="usersRole">
              	<option value="klant">Klant</option>
              	<option value="admin">Admin</option>
              </select><br>
              <button class="uk-button" style="margin-top: 25px;" title="Submit edit" type="submit" name="submit">Edit</button>
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
        </tr>
      </table>
    </div>
  </div>
</section>
<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>