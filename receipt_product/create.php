<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$goods = $pdo->query("SELECT * FROM goods")->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="actions/store.php" method="post">
    <input type="hidden" name="goods" id="goods" value="<?= $_GET['id'] ?>">
    <input type="date" id="datetime" name="datetime">
    <input type="number" placeholder="Количество" id="quantity" name="quantity">
    <input type="submit" value="Отправить" id="btn" >
</form>
</body>
</html>
