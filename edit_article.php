<?php
  $pagetitle= "Create Article";
?>
<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  $id = $_GET['id'];
  if (count($_POST) > 0) {
    $sql = "UPDATE article SET name=?, price=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
  
    try {
      $stmt->execute([$_POST['name'], $_POST['price'], $id]);
      header("Location: article.php?error=edit");
      exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
  
  $sql = "SELECT * FROM article WHERE id=?";
  $stmt = $pdo->prepare($sql);
  
  try {
      $stmt->execute([$id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
?>

<section class=bmi-b1>
  <h1>Edit article</h1>
  <div class='row'>
    <div class='col'>
      <form action="" method="post">
        <label>Name</label><br>
        <input type="varchar" name="name" value="<?php echo $row['name']; ?>"><br>
        <label>Price</label><br>
        <input type="float" name="price" value="<?php echo $row['price']; ?>"><br>
        <button class="uk-button" type="submit" name="submit" title='Submit Article'>Add</button>
        <!-- Code for error and massages -->
      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>