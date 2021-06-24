<?php
    $temp = 6;
    echo "<p>The temparature is taken <font color=green><u>$temp&#xb0;C</font></u></p>";
    $tempInFahren = ($temp * (9/5)) + 32;
    echo "<p>The temparature in Fahrenheit is <font color=green><u>$tempInFahren&#xb0;F</font></u></p>";

    $temp = 12;
    echo "<p>The temparature is taken <font color=green><u>$temp&#xb0;F</font></u></p>";
    $tempInDeg = ($temp - 32) / (9/5);
    echo "<p>The temparature in Degree is <font color=green><u>$tempInDeg&#xb0;C</font></u></p>";
?>