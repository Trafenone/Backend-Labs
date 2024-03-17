<?php
session_start();

function setFontSize($size) {
    $_SESSION['font_size'] = $size;
}

$fontSize = $_SESSION['font_size'] ?? '16px';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Розмір шрифту</title>
    <style>
        body {
            font-size: <?php echo $fontSize; ?>;
        }
    </style>
</head>
<body>
<h1>Вибір розміру шрифту</h1>

<div>
    <a href="?size=large">Великий шрифт</a> |
    <a href="?size=medium">Середній шрифт</a> |
    <a href="?size=small">Маленький шрифт</a>
</div>

<?php
if (isset($_GET['size'])) {
    $size = $_GET['size'];

    switch ($size) {
        case 'large':
            setFontSize('20px');
            break;
        case 'medium':
            setFontSize('16px');
            break;
        case 'small':
            setFontSize('12px');
            break;
        default:
            setFontSize('16px');
    }

    header("Location: {$_SERVER['PHP_SELF']}");
    //exit();
}
?>

</body>
</html>
