<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_GET['id'];
$goods= $pdo ->query("SELECT * FROM goods " ) ->fetchAll(PDO::FETCH_ASSOC);
$receipt = $pdo ->query("SELECT * FROM receipts WHERE id = '$id'") ->fetch(PDO::FETCH_ASSOC);
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
<form action="/receipt/actions/update.php" method="post">
    <input name="id" type="hidden" value="<?= $receipt['id'] ?>">
    <select name="goods" id="goods">
        <?php foreach ($goods as $good): ?>
            <option value="<?= $good['id'] ?>"><?= $good['name'] ?></option>
        <?php endforeach; ?></select>
        <input type="date" id="datetime" name="datetime" value="<?= $receipt['datetime'] ?>">
        <input type="number" placeholder="Количество" id="quantity" name="quantity" value="<?= $receipt['quantity'] ?>">
        <input type="submit" value="Отправить" id="btn" >
</form>
</body>
</html>
