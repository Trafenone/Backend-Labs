<?php
    $month_number = 5;

    if ($month_number >= 3 && $month_number <= 5) {
        $season = "Spring";
    } elseif ($month_number >= 6 && $month_number <= 8) {
        $season = "Summer";
    } elseif ($month_number >= 9 && $month_number <= 11) {
        $season = "Autumn";
    } else {
        $season = "Winter";
    }

    echo "<h1>$season</h1>";
?>