<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_POST['id'];
$goods= $_POST['goods'];
$datetime = $_POST['datetime'];
$quantity = $_POST['quantity'];
$pdo->query("UPDATE receipts SET goods_id = '$goods', datetime = '$datetime' , quantity = '$quantity' WHERE id = '$id'");
header('Location: /receipt_product/?id=' . $goods);
