<?php
//Deze functie checked of alle functie en geeft een foutmelding bij een false en execute het programma bij en true
if (isset($_POST["submit-edit"])) {
  require_once 'db.inc.php';
  require_once 'function.inc.php';

  $name = $_POST["usersFirstName"];
  $lastname = $_POST["usersLastname"];
  $email = $_POST["usersEmail"];
  $username = $_POST["usersUID"];
  $pwd = $_POST["usersPWD"];
  $pwdRepeat = $_POST["pwdrepeat"];
  $role = $_POST['usersRole'];
  $date = date_create()->format('Y-m-d H:i:s');

  //This code checks if any of the input field checks have been triggert and sends it to the signup page
  if (emptyInputDashboard($name, $lastname, $email, $username, $pwd, $pwdRepeat, $role) !== false) {
    header("location: ../dashboard.php?error=emptyinput");
    exit();
  }
  if (invalidUid($username) !== false) {
    header("location: ../dashboard.php?error=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../dashboard.php?error=invalidemail");
    exit();
  }
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../dashboard.php?error=nomatchfound");
    exit();
  }
  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../dashboard.php?error=usernametaken");
    exit();
  }
}