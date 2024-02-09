<?php
  $pagetitle= "Dashboard";
  require_once 'includes/header.php';
?>

<section class=bmi-b1>
  <h1 style="margin-bottom: 50px; text-align:center;">Administratie</h1>
  <div class='row60'>
  <h2 style="margin-bottom: 20px;">Users table</h2>
    <div class='col'>
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
              <a title='Edit' class='edit' href='edit_users.php?usersID=".$row["usersID"]."'>Edit</a>
              </td></tr>";
            }
            echo "</table>";
          }
          else {
            echo "0 results";
          }
        ?>
      </table><br>
		</div>
    <a href="add_users.php" class="uk-button">Add user</a>
  </div>
</section>
<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>