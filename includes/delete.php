<?php
  require_once 'db.inc.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM article WHERE id=?";
  $stmt = $pdo->prepare($sql);
  try {
    $stmt->execute([$id]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      header("Location: ../article.php?error=delete");
      exit();
    } else {
      header("Location: ../article.php?error=unknown");
      exit();
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
} 
// This code is used to delete a user from the database
if (isset($_GET['usersID'])) {
  $id = $_GET['usersID'];
  $sql = "DELETE FROM users WHERE usersID=?";
  $stmt = $pdo->prepare($sql);
  try {
    $stmt->execute([$id]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      header("Location: ../dashboard.php?error=delete");
      exit();
    } else {
      header("Location: ../dashboard.php?error=unknown");
      exit();
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}