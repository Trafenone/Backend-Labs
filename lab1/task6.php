<?php
    $number = mt_rand(100, 999);

    $splitNumber = str_split($number);

    $sum = array_sum($splitNumber);

    $reversedNumber = implode(array_reverse($splitNumber));

    rsort($splitNumber);

    $bigNumber = implode($splitNumber);

    echo "<h4>Current number = " . $number . "</h4>";
    echo "<ol>";
    echo "<li>Sum = " . $sum . "</li>";
    echo "<li>Reversed number = " . $reversedNumber . "</li>";
    echo "<li>New the bigest number = " . $bigNumber . "</li>";
    echo "</ol>";
?>