<?php

include '../config/config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
DELETE FROM eleve
WHERE id_eleve=?
");

$stmt->execute([$id]);

header("Location:index.php");
exit;