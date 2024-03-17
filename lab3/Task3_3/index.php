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
    $fileName = "file.txt";
    $resultName = "result.txt";

    if(file_exists($fileName)) {
        $readStream = fopen($fileName, "r");

        if($readStream) {
            $content = fread($readStream, filesize($fileName));
            fclose($readStream);
            print_r($content);

            $writeStream = fopen($resultName, "w");

            $result = explode(" ",str_replace(array("\n")," ", $content));

            print_r($result);

            sort($result);

            fwrite($writeStream, implode(" ", $result));
            fclose($writeStream);
        }
    } else {
        echo "Файл не існує";
    }
?>
</body>
</html>