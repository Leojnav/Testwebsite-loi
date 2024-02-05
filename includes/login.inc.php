<?php
//Deze functie checked of alle functie en geeft een foutmelding bij een false en execute het programma bij en true
if (isset($_POST["submit"])) {
    $username = $_POST["usersUID"];    
    $pwd = $_POST["usersPWD"];

    require_once 'db.inc.php';
    require_once 'function.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: /logIn.php?error=emptyinput");
        exit();
    }

    loginUser($pdo, $username, $pwd);
}
else {
    header("location: /logIn.php");
    exit();
}