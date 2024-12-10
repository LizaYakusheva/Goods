<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_GET['id'];
$receipts = $pdo->query("SELECT * FROM receipts WHERE goods_id = '$id'")->fetchAll();
$good = $pdo->query("SELECT * FROM goods WHERE id = '$id'")->fetch();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $good['name']?></title>
</head>
<body>
<h1><?= $good['name'] ?></h1>
<a href="/receipt_product/create.php?id=<?= $good['id'] ?>">Добавить поставку</a>
<table>
    <thead>
    <td>datetime</td>
    <td>quantity</td>
    </thead>
    <tbody>
    <?php foreach ($receipts as $receipt): ?>
        <tr>
            <td><?= $receipt['datetime'] ?></td>
            <td><?= $receipt['quantity'] ?></td>
            <td><a id="update" href="/receipt_product/edit.php?id=<?= $receipt['id'] ?>&good_id=<?= $good['id'] ?>">Изменить</a></td>
            <td><a id="delete" href="/receipt_product/actions/delete.php?id=<?= $receipt['id']?>&good_id=<?= $good['id'] ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="/">Назад</a>
</body>
</html>