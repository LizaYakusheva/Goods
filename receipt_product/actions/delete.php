<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_GET['id'];
$good = $_GET['good_id'];
$pdo->query("DELETE FROM receipts WHERE id=" . $id);
header('Location: /receipt_product/?id=' . $good);