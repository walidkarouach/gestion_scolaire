<?php

include '../config/config.php';

$id_classe = $_GET['id_classe'];
$id_enseignant = $_GET['id_enseignant'];
$id_matiere = $_GET['id_matiere'];

$stmt = $pdo->prepare("
DELETE FROM affectation
WHERE id_classe=?
AND id_enseignant=?
AND id_matiere=?
");

$stmt->execute([
$id_classe,
$id_enseignant,
$id_matiere
]);

header("Location:index.php");
exit;