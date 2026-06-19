<?php

include '../config/config.php';

$id = $_GET['id'];

$sql = "DELETE FROM enseignant WHERE id_enseignant = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
exit;