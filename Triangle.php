<?php
    $a = 2.2; $b = 4.3; $c = 3.2;
    $s = ($a + $b + $c) / 2;
    $area = (1/2) * sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
    echo "<p>The area of the square is : <font color=green><u>$area unit</u><sup>2</sup></font></p>";
?>