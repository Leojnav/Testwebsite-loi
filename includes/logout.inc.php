<?php
//This funtion makes it so the sesion ends and the user is logged out
session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();