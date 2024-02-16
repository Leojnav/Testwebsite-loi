<?php
  $pagetitle= "Articles";
?>
<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<section class=bmi-b1>
  <h1>Article page</h1>
  <div class='row'>
    <div class='col'>
      <?php
        if (isset($_GET["error"])) {
        	if ($_GET["error"] == "unknown") {
        		echo "<p class='errormassage'>Something went wrong, try again next time!</p>";
        	} else if ($_GET["error"] == "none") {
        		echo "<p class='errormassage'>You created a article!</p>";
        	} else if ($_GET["error"] == "duplicate") {
        		echo "<p class='errormassage'>This article already exists!</p>";
        	} else if ($_GET["error"] == "edit") {
        		echo "<p class='errormassage'>You edited a article succesfully!</p>";
        	} else if ($_GET["error"] == "delete") {
        		echo "<p class='errormassage'>You deleted a article succesfully!</p>";
        	}
        }
      ?>
    <table>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
      </tr>
      <?php
        $sql = "SELECT * FROM article ORDER BY id ASC";
        $stmt = $pdo->query($sql);

        if ($stmt) {
          $resultCheck = $stmt->rowCount();
        
          if ($resultCheck > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td>
              <td>
                <a title='Edit' class='edit' href='edit_article.php?id=".$row["id"]."'>Edit</a>
                <a title='Delete' class='delete' href='includes/delete.php?id=".$row["id"]."'>Delete</a>
              </td></tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
        } else {
          echo "Error: " . $pdo->errorInfo()[2];
        }
      ?>
      <a href="create_article.php">Create article</a>
    </div>
  </div>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>