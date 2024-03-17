<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 7_2</title>
</head>
<style>
    body {
        background-color: black;
        position: relative;
    }
</style>
<body>
    <?php
        displaySquares(15);
        function displaySquares($n)
        {
            for ($i = 0; $i < $n; $i++) {
                $size = rand(20, 100);
                $top = rand(20, 650);
                $left = rand(20, 1400);
                echo '<div style="position: absolute; top: ' . $top . 'px; left: ' . $left . 'px; width: ' . $size . 'px; height: ' . $size . 'px; background-color: red;"></div>';
            }
        }
    ?>
</body>
</html>