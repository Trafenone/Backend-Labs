<style>
    table {
        border-collapse: collapse;
        width: 50%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<?php

require_once "Function/func.php";

if(isset($_POST['submit'])) {
    $x = isset($_POST['x']) ? (float)$_POST['x'] : 0;
    $y = isset($_POST['y']) ? (float)$_POST['y'] : 0;

    $functions = array(
        'sin' => MySin($x),
        'cos' => MyCos($x),
        'tg' => MyTg($x),
        'my_tg' => MyTg2($x),
        'pow' => MyPow($x, $y),
        'factorial' => MyFactorial($x)
    );

    echo '<table>
            <tr>
                <th>Sin</th>
                <th>Cos</th>
                <th>Tg</th>
                <th>My_Tg</th>
                <th>Pow</th>
                <th>Factorial</th>
            </tr>';

    echo  '<tr>';

    foreach ($functions as $functionName => $result) {
        echo '<td>', $result, '</td>';
    }

    echo "</tr>";

    echo '</table>';
}

?>

