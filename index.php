<?php  
$pagetitle = "Hello World!";
$fullname = <<<_END
  Joël van Sandijk
_END;
$age = <<<_END
  20 
_END;
$pets = <<<_END
  2 Cats of almost 1 year old and a dog whose age I don't know. 
_END;
$hobby = <<<_END
  playing games, watching movies and series, listening to music and programming.
_END;
$country = <<<_END
  The Netherlands
_END;
?>
<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
?>
<section class=home-b1>
  <h1>
    <?php echo $pagetitle; ?>
  </h1>
  <h3>
    <?php echo "My name is ".$fullname."."; ?>
  </h3>
  <p>
    <?php echo "Today i will tell you a little about my self. I am ".$age." years old. And i live in the ".$country.". At home i have ".$pets." And my hobby's are ".$hobby; ?>
  </p>
  <div class='row'>
    <?php
    for ($tafel= 8; $tafel <= 12; $tafel++) {
      echo "<div class='col1-5'>";
      for ($keersom = 1; $keersom <= 10; $keersom++) {
        echo "<p>".$keersom." x ".$tafel." = ".$keersom * $tafel."<br></p>";
      }
      echo "</div>";
    }
    ?>
  </div>
</section>
<section class=home-b1>
  <div class='col'>
<?php
    // $test = tree();
    // echo '<img src="' . $test . '" alt="Boom van Pythagoras">';
    echo '<img src="' . tree() . '" alt="Tree Image" />';
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
?>
  </div>
</section>


<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>