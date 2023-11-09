<?php
  $pagetitle= "Experimentation lab";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
?>

<section class=home-b1>
<?php
  $mycounter = 1;
  $mystring  = "Hello";
  $myarray   = array("One", "Two", "Three");
  echo $mycounter."<br>".$mystring."<br>".$myarray[0]."<br>";
  $oxo = array(array('x', ' ', 'o'),
               array('o', 'o', 'x'),
               array('x', 'o', ' '));
  
  echo $oxo[2][0];
// if ($hour > 12 && $hour < 14) ;
$x = 9;
$y = 1;
if (++$x == 10) echo $x;
if (--$y ==0) echo $y;
  $author = "Scott Adams";
  $out = <<<_END
    Normal people believe that if it ain’t broke, don’t fix it.
  Engineers believe that if it ain’t broke, it doesn’t have enough
  features yet.
  - $author.
_END;
echo $out;
?>
<br>
<?php 
  $number = 12345 * 67890;
  echo substr($number, 0, 4);
  // $enough = $fuel <= 1 ? FALSE : TRUE;
  // echo $fuel <= 1 ? "Fill tank now" : "There's enough fuel";
  echo longdate(time());
  echo longdate(time() - 7 * 24 * 60 * 60);
  $came_from = htmlentities($_SERVER['HTTP_REFERER']);
  echo __FILE__;
  // echo $red;
  echo "a: [" . (20 > 9) . "]<br>";
  echo "b: [" . (5 == 6) . "]<br>";
  echo "c: [" . (1 == 0) . "]<br>";
  echo "d: [" . (1 == 1) . "]<br>";
  echo "d: [" . (12 ^ 8) . "]<br>";
  $a = 2; $b = 0;
  if ($a > $b)  echo "$a is greater than $b<br>";
  if ($a < $b)  echo "$a is less than $b<br>";
  if ($a >= $b) echo "$a is greater than or equal to $b<br>";
  if ($a <= $b) echo "$a is less than or equal to $b<br>";
  $page = "test";
  switch ($page) {
  	case "Home":  echo "You selected Home";
  		break;
  	case "About": echo "You selected About";
  		break;
  	case "News":  echo "You selected News";
  		break;
  	case "Login": echo "You selected Login";
  		break;
  	case "Links": echo "You selected Links";
  		break;
    default:
	    echo "Unrecognized selection";
		break;
  }
  $count = 0;
  // while (++$count <= 12)
	// echo "$count times 12 is " . $count * 12 . "<br>";
  // do {
  //   echo "$count times 12 is " . $count * 12;
  //   echo "<br>";
  //   } while (++$count <= 12);
  // for ($count = 1 ; $count <= 12 ; ++$count){
  // 	echo "$count times 12 is " . $count * 12;
  // 	echo "<br>";
  //   if ($count == 8) continue;
  //   if (!$count == 13) break 1;
  // }
  echo strrev(" .dlrow olleH"); // Reverse string
  echo str_repeat("Hip ", 2);   // Repeat string
  echo strtoupper("hooray!");   // String to upper case
  $fullname = "WILLIAM";
  $name = "henry";
  $lastname = "gatES";
  echo $fullname . " " . $name . " " . $lastname. "<br>";
  fix_names();
  echo $fullname . " " . $name . " " . $lastname. "<br>";
  function fix_names(){
    global $fullname;$fullname = ucfirst(strtolower($fullname));
    global $name; $name = ucfirst(strtolower($name));
    global $lastname;$lastname = ucfirst(strtolower($lastname));
  }
  $object           = new Subscriber;
  $object->name     = "Fred";
  $object->password = "pword";
  $object->phone    = "012 345 6789";
  $object->email    = "fred@bloggs.com";
  $object->display();
  
  class User
  {
    public $name, $password;

    function save_user()
    {
      echo "Save User code goes here";
    }
  }

  class Subscriber extends User
  {
    public $phone, $email;

    function display()
    {
      echo "Name: "  . $this->name     . "<br>";
      echo "Pass: "  . $this->password . "<br>";
      echo "Phone: " . $this->phone    . "<br>";
      echo "Email: " . $this->email;
    }
  }
    class BoomVanPythagoras {
    public function tekenBoom() {
      $size = 200;
      $image = imagecreatetruecolor($size, $size);
      $pink = imagecolorallocate($image, 255, 105, 180); // pink
      $white = imagecolorallocate($image, 255, 255, 255); // white
      imagefill($image, 0, 0, $white);
      imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $pink);
      header('Content-Type: image/png');
      imagepng($image);
      imagedestroy($image);
    }
  }
  $boomVanPythagoras = new BoomVanPythagoras();
  $boomVanPythagoras->tekenBoom();
?>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>
