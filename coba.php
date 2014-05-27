<?php

$dStart = new DateTime('2012-07-26');
   $dEnd  = new DateTime('2012-08-26');
   $dDiff = $dStart->diff($dEnd);
  // echo $dDiff->format('%R'); // use for point out relation: smaller/greater
   echo $dDiff->days;


?>