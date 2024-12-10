<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$goods= $_POST['goods'];
$datetime = $_POST['datetime'];
$quantity = $_POST['quantity'];
$receipts = $pdo->query("insert into receipts (goods_id, datetime, quantity) values ('$goods','$datetime','$quantity')");
header('Location: /receipt/index.php');