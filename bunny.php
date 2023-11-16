<?php
  $pagetitle= "Emo Bunny";
?>

<!-- Navbar & Database + other includes -->
<?php
	require_once 'includes/header.php';
?>
<section class=bunny-b1>
  <?php
  class Bunny {
    public $ears = "()_()";
    public $face;
    public $emotion;
    public $emotion_txt;
    public $feet = '("")("")';
    public $emotion_counts = [];
    public $total= 0;

    private function emotions() {
      $emotion = array(
        'Angry' => array("(!.!)"),
        'Happy' => array("(^.^)"),
        'Sad' => array("(~.~)"),
        'Confussed' => array("(?.?)"),
        'Shy' => array("(>.<)"),
        'Scared' => array("(o.o)"),
        'Tired' => array("(-.-)"),
        'Shocked' => array("(@.@)"),
        'Greed' => array("($.$)"),
      );
      return $emotion;
    }
    private function random_face() {
      $emotion = $this->emotions();
      $key = array_rand($emotion);
      $this->emotion = $key;
      $this->emotion_count();
      $this->face = $emotion[$key][0];
      
      return array($this->face);
    }
    private function emotion_count() {
      // Initialize the count for this emotion if not already set
      if (!isset($this->emotion_counts[$this->emotion])) {
        $this->emotion_counts[$this->emotion] = 0;
      }
      $this->emotion_counts[$this->emotion]++;
    }
    public function Emobunny() {
      $total = 0;
      foreach (array_keys($this->emotions()) as $emotion) {
        $this->emotion_counts[$emotion] = 0;
      }
      echo "<div class='row'>";
      for ($row=0; $row < 15; $row++) {
        echo '<div class="col1-15">';
        for ($i=0; $i < 2; $i++) {
          $this->random_face();
          echo "<p>".$this->ears."</p>";
          echo "<p>".$this->face."</p>";
          echo "<p>".$this->feet."</p><br><br>";
        }
        echo '</div>';
      }
      echo "</div>";
      echo "<div class='row40'><div class='col'><h3>Emotion count:</h3></div>";
      foreach ($this->emotion_counts as $emotion => $count) {
        echo "<div class='col1-5'><p>$emotion: $count</p></div>";
        $total = $total + $count;
      }
      echo "<div class='col'><p><br>total amount of bunny's: ".$total."</p></div></div>";
      $fh = fopen("testfile.txt", 'a') or die("Failed to create file");
      $number = 1;
      $text = "Iteration #$number\n\n";
      $number++;
      fwrite($fh, $text) or die("Could not write to file");
      fclose($fh);
      foreach ($this->emotion_counts as $emotion => $count) {
        $fh = fopen("testfile.txt", 'a') or die("Failed to create file");
        $text = "$emotion: $count\n";
        fwrite($fh, $text) or die("Could not write to file");
        fclose($fh);
    }
    
    $fh = fopen("testfile.txt", 'a') or die("Failed to create file");
    $text = "\ntotal amount of bunny's: $total\n\n";
    fwrite($fh, $text) or die("Could not write to file");
    fclose($fh);
    echo "File 'testfile.txt' written successfully";
    }
  }
  $bunny = new Bunny(); 
  $bunny->Emobunny();
  ?>
</section>


<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>
