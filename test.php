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
$paper = array("Copier", "Inkjet", "Laser", "Photo");
$j = 0;
foreach($paper as $item){
  echo "$j: $item<br>";
  ++$j;
}
$paper = array(
  'copier' => "Copier & Multipurpose",
  'inkjet' => "Inkjet Printer",
  'laser'  => "Laser Printer",
  'photo'  => "Photographic Paper"
);
while (list($item, $description) = myEach($paper))
 echo "$item: $description<br>";
echo "<pre>"; // Enables viewing of the spaces
  printf("The result is $%15f\n", 123.42 / 12);// Pad to 15 spaces
  printf("The result is $%015f\n", 123.42 / 12);// Pad to 15 spaces, fill with zeros
  printf("The result is $%15.2f\n", 123.42 / 12);// Pad to 15 spaces, 2 decimal places precision
  printf("The result is $%015.2f\n", 123.42 / 12); // Pad to 15 spaces, 2 decimal places precision, fill with zeros
  printf("The result is $%'#15.2f\n", 123.42 / 12); // Pad to 15 spaces, 2 decimal places precision, fill with # symbol
  printf("%'*7.5s\n", "happy birthdaty"); // Left justify, pad '@', cutoff 10 chars
//   $fh = fopen("testfile.txt", 'w') or die("Failed to create file");
//   $text = <<<_END
// Line 1
// Line 2
// Line 3
// _END;
//   fwrite($fh, $text) or die("Could not write to file");
//   fclose($fh);
//   echo "File 'testfile.txt' written successfully";
$string = "1 2 3 4 5 6 7 8 9 10 je? heet Hoe";
function reversestring($string) {
  $string = explode(" ", $string);
  $string = array_reverse($string);
  $string = implode(" ", $string);
  return $string;
}
echo reversestring($string);

function factorial($number) {
  if ($number < 2) {
    return 1;
  } else {
    return ($number * factorial($number-1));
  }
}
echo factorial(4);
$color = array('red', 'green', 'white');
echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the ".$color[0]." carpet, the ".$color[1]." lawn, the ".$color[2]." house, the leaden sky. The new president and his first lady. - Richard M. Nixon";
$merken = array(
  'Volvo' => array("Blue", "Green", "Yellow"),
  'Audi' => array("Blue", "Green", "Yellow"),
  'BMW' => array("Blue", "Green", "Yellow"),
  'Skoda' => array("Blue", "Green", "Yellow")
);
echo "<ul>";
foreach($merken as $key => $value) {
  switch ($key) {
    case "Volvo":  echo "<li>".$key."@".$value[0]."</li>";break;
    case "Audi":  echo "<li>".$key."@".$value[1]."</li>";break;
    case "BMW":  echo "<li>".$key."@".$value[2]."</li>";break;
    case "Skoda":  echo "<li>".$key."@".$value[2]."</li>";break;
    default: echo "Unrecognized selection";break;
  }
}
$ceu = array("Italy" => "Rome" , "Luxembourg" => "Luxembourg",
"Belgium" => "Brussels" , "Denmark" => "Copenhagen",
"Finland" => "Helsinki" , "France" => "Paris",
"Slovakia" => "Bratislava" , "Slovenia" => "Ljubljana",
"Germany" => "Berlin" , " Greece " => "Athens",
"Ireland" => "Dublin" ," Netherlands " => "Amsterdam",
"Portugal" => "Lisbon" , " Spain "  =>  "Madrid",
"Sweden" => "Stockholm" , "United  Kingdom" => "London",
"Cyprus" => "Nicosia " , "Lithuania" => "Vilnius",
"Czech Republic " => "Prague" , "Estonia" => "Tallin",
"Hungary" => "Budapest" , "Latvia" => "Riga", "Malta" => "Valetta",
"Austria" => "Vienna" , "Poland " => "Warsaw"); asort($ceu);
foreach($ceu as $country => $capital) {
echo "<p>The capital of ".$country." is ".$capital."</p>";
}
?>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>
