<?php
    printTable(5,5);

    function printTable($row, $col)
    {
        echo "<table width='300px' height='300px'>";
        for($i = 0; $i < $row; $i++) {
            echo "<tr>";
            for($j = 0; $j < $col; $j++) {
                $color = getColor();
                echo "<td style='background-color: $color'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function getColor()
    {
        $colors = array('red', 'green', 'blue', 'yellow', 'orange', 'purple', 'cyan', 'pink');
        $randomIndex = array_rand($colors);
        return $colors[$randomIndex];
    }
?>