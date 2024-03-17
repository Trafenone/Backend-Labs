<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    form {
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    label {
        text-align: center;
        margin: 5px;
    }

    label, input {
        display: block;
    }

    .group {
        margin: 5px;
    }

    .group button {
        padding: 0 20px;
    }

</style>
<body>
    <form action="calculate.php" method="POST">
        <div class="group">
            <label for="x">X</label>
            <input type="number" name="x" id="x"/>
        </div>
        <div class="group">
            <label for="y">Y</label>
            <input type="number" name="y" id="y"/>
        </div>
        <div class="group">
            <button type="submit" name="submit">=</button>
        </div>
    </form>
</body>
</html>