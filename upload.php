<?php
  $pagetitle= "Upload";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<section class=upload-b1>
  <div class='row'>
    <div class='col'>
    <form method='post' action='' enctype='multipart/form-data'>
    <h3>Select a JPG, GIF, PNG or TIF File:</h3>
    <input type='file' name='filename' size='10'>
    <input class="uk-button" type='submit' value='Upload'>
    </form>
    <?php
      if ($_FILES)
      {
        $name = $_FILES['filename']['name'];
        $name = strtolower(preg_replace("[^A-Za-z0-9.]", "", $name));
        switch($_FILES['filename']['type'])
        {
          case 'image/jpeg': $ext = 'jpg'; break;
          case 'image/svg':  $ext = 'svg'; break;
          case 'image/png':  $ext = 'png'; break;
          case 'image/webp': $ext = 'webp'; break;
          case 'image/jpeg':  $ext = 'jpg'; break;
          default:           $ext = '';    break;
        }
        if ($ext)
        {
          $target_directory = "images/";
          $n = $target_directory . basename($_FILES['filename']['name']);
          move_uploaded_file($_FILES['filename']['tmp_name'], $n);
          echo "Uploaded image '$name' as '$n':<br>";
        }
        else echo "'$name' is not an accepted image file";
      }
      else echo "No image has been uploaded";
    ?>
  </div>
</section>


<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>


