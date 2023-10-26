<?php
  $mycounter = 1;
  $mystring  = "Hello";
  $myarray   = array("One", "Two", "Three");
  echo $mycounter."<br>".$mystring."<br>".$myarray[0]."<br>";
  $oxo = array(array('x', ' ', 'o'),
               array('o', 'o', 'x'),
               array('x', 'o', ' '));
  
  echo $oxo[2][0];
if ($hour > 12 && $hour < 14) ;
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
  $b ? print "TRUE" : print "FALSE";
  echo longdate(time());
  echo longdate(time() - 7 * 24 * 60 * 60);
  $came_from = htmlentities($_SERVER['HTTP_REFERER']);
  echo __FILE__;
  echo $red;