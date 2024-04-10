<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

use Controllers\ItemController;

require_once "autoload.php";

//require_once 'Controllers/ItemController.php';

$itemId = 1;
$itemController = new ItemController();

echo $itemController->getItem($itemId);
?>
</body>
</html>