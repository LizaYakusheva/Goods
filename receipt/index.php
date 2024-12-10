<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$receipts = $pdo->query("SELECT receipts.*, goods.name AS goods_name FROM `receipts` LEFT JOIN `goods` ON goods_id = goods.id ")-> fetchAll(pdo::FETCH_ASSOC);
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
<h1>Поступление товаров</h1>
<a href="create.php" id="create">Добавить поставку</a>
<table>
    <thead>
    <td>name</td>
    <td>datetime</td>
    <td>quantity</td>
    </thead>
    <tbody>
    <?php foreach ($receipts as $receipt): ?>
    <tr>
        <td><?= $receipt['goods_name'] ?></td>
        <td><?= $receipt['datetime'] ?></td>
        <td><?= $receipt['quantity'] ?></td>
        <td><a id="update" href="/receipt/edit.php?id=<?= $receipt['id'] ?>">Изменить</a></td>
        <td><a id="delete" href="/receipt/actions/delete.php?id=<?= $receipt['id'] ?>">Удалить</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="/">Назад</a>
</body>
</html>