<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $username = $_SESSION['username'];
    echo "Добрий день, $username! <br>";
    echo '<a href="logout.php">Вийти</a>';
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $login;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $error_message = 'Невірний логін або пароль.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма авторизації</title>
</head>
<body>

<?php
if (isset($error_message)) {
    echo "<p>$error_message</p>";
}
?>

<?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']): ?>
    <h2>Форма авторизації</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="login">Логін:</label>
        <input type="text" name="login" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Увійти</button>
    </form>
<?php endif; ?>

</body>
</html>
