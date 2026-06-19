<?php

include '../config/config.php';
include '../includes/header.php';

$enseignants = $pdo->query("SELECT * FROM enseignant");
$matieres = $pdo->query("SELECT * FROM matiere");
$classes = $pdo->query("SELECT * FROM classe");

if(isset($_POST['ajouter'])){

$stmt = $pdo->prepare("
INSERT INTO affectation
(id_enseignant,id_matiere,id_classe)
VALUES(?,?,?)
");

$stmt->execute([
$_POST['id_enseignant'],
$_POST['id_matiere'],
$_POST['id_classe']
]);

header("Location:index.php");
exit;
}

?>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white shadow-lg rounded-xl p-8">

<h1 class="text-3xl font-bold text-center text-red-500 mb-6">
Ajouter Affectation
</h1>

<form method="POST">

<div class="mb-4">

<label class="block mb-2">
Enseignant
</label>

<select
name="id_enseignant"
class="w-full border rounded p-3"
required>

<option value="">
Choisir Enseignant
</option>

<?php foreach($enseignants as $e): ?>

<option value="<?= $e['id_enseignant'] ?>">
<?= $e['nom'] ?> <?= $e['prenom'] ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-4">

<label class="block mb-2">
Matière
</label>

<select
name="id_matiere"
class="w-full border rounded p-3"
required>

<option value="">
Choisir Matière
</option>

<?php foreach($matieres as $m): ?>

<option value="<?= $m['id_matiere'] ?>">
<?= $m['nom_matiere'] ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-6">

<label class="block mb-2">
Classe
</label>

<select
name="id_classe"
class="w-full border rounded p-3"
required>

<option value="">
Choisir Classe
</option>

<?php foreach($classes as $c): ?>

<option value="<?= $c['id_classe'] ?>">
<?= $c['nom_classe'] ?>
</option>

<?php endforeach; ?>

</select>

</div>

<button
name="ajouter"
class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded">
Ajouter
</button>

</form>

</div>

</div>

<?php include '../includes/footer.php'; ?>