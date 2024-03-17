<?php

function findUniqueInFirst($file1, $file2) : array {
    $lines1 = file($file1, FILE_IGNORE_NEW_LINES);
    $lines2 = file($file2, FILE_IGNORE_NEW_LINES);

    $words1 = array_map('trim', explode(' ', reset($lines1)));
    $words2 = array_map('trim', explode(' ', reset($lines2)));

    return array_diff($words1, $words2);
}

function findCommon($file1, $file2) : array {
    $lines1 = file($file1, FILE_IGNORE_NEW_LINES);
    $lines2 = file($file2, FILE_IGNORE_NEW_LINES);

    $words1 = array_map('trim', explode(' ', reset($lines1)));
    $words2 = array_map('trim', explode(' ', reset($lines2)));

    return array_unique(array_intersect($words1, $words2));
}

function findRepeated($file1, $file2) : array {
    $lines1 = file($file1, FILE_IGNORE_NEW_LINES);
    $lines2 = file($file2, FILE_IGNORE_NEW_LINES);

    $words1 = array_map('trim', explode(' ', reset($lines1)));
    $words2 = array_map('trim', explode(' ', reset($lines2)));

    $allLines = array_merge($words1, $words2);

    $counts = array_count_values($allLines);
    $repeated = array_filter($counts, function ($count) {
        return $count > 2;
    });

    return array_keys($repeated);
}

function saveFile($name, $content) {
    $stream = fopen($name, "w");
    fwrite($stream, implode(" ", $content));
    fclose($stream);
}

$file1 = "file1.txt";
$file2 = "file2.txt";

saveFile("Unique.txt", findUniqueInFirst($file1, $file2));
saveFile("Common.txt", findCommon($file1, $file2));
saveFile("Repeated.txt", findRepeated($file1, $file2));

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileName = isset($_POST['fileName']) ? trim($_POST['fileName']) : '';

    if (!empty($fileName)) {
        if (file_exists($fileName)) {
            unlink($fileName);
            echo "Файл '$fileName' був видалений.";
        } else {
            echo "Файл '$fileName' не існує.";
        }
    } else {
        echo "Будь ласка, введіть ім'я файлу.";
    }
}
?>

<form action="" method="post">
    <label for="fileName">Ім'я файлу:</label>
    <input type="text" id="fileName" name="fileName" required>
    <button type="submit">Видалити</button>
</form>

</body>
</html>
