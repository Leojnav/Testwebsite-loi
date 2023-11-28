<?php
// //Creating a connection to the database
// $servername = "localhost";
// $dbUsername = "root";
// $password = "";
// $dbname = "webmarketing";

// // Create connection
// $conn = new mysqli($servername, $dbUsername, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

$host = 'localhost';    
$data = 'testwebsite_loi'; 
$user = 'root'; 
$pass = '';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
try{
  $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e){
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
