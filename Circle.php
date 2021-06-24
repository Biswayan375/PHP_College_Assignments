<?php
    $radius = 3.5;
    $pi = (22/7);
    echo "<p>The radius of the circle is taken: <u><font color=green>$radius units</font></u></p>";
    $area = $pi*($radius * $radius);
    echo "<p>The area of the circle is : <font color=green><u>$area unit</u><sup>2</sup></font></p>";
    $perimeter = 2 * $pi * $radius;
    echo "<p>The perimeter of the circle is : <u><font color=green>$perimeter unit</font></u></p>";
?>