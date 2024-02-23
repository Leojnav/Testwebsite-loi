<?php
//Deze functie checked of alle functie en geeft een foutmelding bij een false en execute het programma bij en true
if (isset($_POST["submit-signup"])) {
    $name = $_POST["usersFirstName"];
    $lastname = $_POST["usersLastname"];
    $email = $_POST["usersEmail"];
    $username = $_POST["usersUID"];
    $pwd = $_POST["usersPWD"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $role = "user";
    $date = date_create()->format('Y-m-d H:i:s');
    
    require_once 'db.inc.php';
    require_once 'function.inc.php';
    //This code checks if any of the input field checks have been triggert and sends it to the signup page
    if (emptyInputSignup($name, $lastname, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../signUp.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signUp.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signUp.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signUp.php?error=nomatchfound");
        exit();
    }
    if (uidExists($pdo, $username, $email) !== false) {
        header("location: ../signUp.php?error=usernametaken");
        exit();
    }
//This send the data to the database
    createUser($pdo, $name, $lastname, $email, $username, $pwd, $role, $date);
}
else if (isset($_POST["submit-adduser"])) {
    $name = $_POST["usersFirstName"];
    $lastname = $_POST["usersLastname"];
    $email = $_POST["usersEmail"];
    $username = $_POST["usersUID"];
    $pwd = $_POST["usersPWD"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $role = $_POST["usersRole"];
    $date = date_create()->format('Y-m-d H:i:s');
    
    require_once 'db.inc.php';
    require_once 'function.inc.php';
    //This code checks if any of the input field checks have been triggert and sends it to the signup page
    if (emptyInputSignup($name, $lastname, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../add_users.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../add_users.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../add_users.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../add_users.php?error=nomatchfound");
        exit();
    }
    if (uidExists($pdo, $username, $email) !== false) {
        header("location: ../add_users.php?error=usernametaken");
        exit();
    }
//This send the data to the database
    createUser($pdo, $name, $lastname, $email, $username, $pwd, $role, $date);
} else {
  header("location: ../index.php"); 
  exit(); 
}