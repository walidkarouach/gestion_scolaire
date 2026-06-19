<?php

include '../config/config.php';
include '../includes/header.php';

$id = $_GET['id'];

$classes = $pdo->query("SELECT * FROM classe");

$stmt = $pdo->prepare("
SELECT * FROM eleve
WHERE id_eleve=?
");

$stmt->execute([$id]);

$eleve = $stmt->fetch();

if(isset($_POST['modifier'])){

$stmt = $pdo->prepare("
UPDATE eleve
SET nom=?,
prenom=?,
date_naissance=?,
adresse=?,
telephone=?,
id_classe=?
WHERE id_eleve=?
");

$stmt->execute([
$_POST['nom'],
$_POST['prenom'],
$_POST['date_naissance'],
$_POST['adresse'],
$_POST['telephone'],
$_POST['id_classe'],
$id
]);

header("Location:index.php");
exit;
}
?>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white shadow-lg rounded-xl p-8">

<h1 class="text-3xl font-bold text-center mb-6">
Modifier Élève
</h1>

<form method="POST">

<input type="text" name="nom"
value="<?= $eleve['nom'] ?>"
class="w-full border rounded p-3 mb-4">

<input type="text" name="prenom"
value="<?= $eleve['prenom'] ?>"
class="w-full border rounded p-3 mb-4">

<input type="date" name="date_naissance"
value="<?= $eleve['date_naissance'] ?>"
class="w-full border rounded p-3 mb-4">

<input type="text" name="adresse"
value="<?= $eleve['adresse'] ?>"
class="w-full border rounded p-3 mb-4">

<input type="text" name="telephone"
value="<?= $eleve['telephone'] ?>"
class="w-full border rounded p-3 mb-4">

<select name="id_classe"
class="w-full border rounded p-3 mb-4">

<?php foreach($classes as $classe): ?>

<option
value="<?= $classe['id_classe'] ?>"
<?= $classe['id_classe'] == $eleve['id_classe'] ? 'selected' : '' ?>>

<?= $classe['nom_classe'] ?>

</option>

<?php endforeach; ?>

</select>

<button
name="modifier"
class="bg-blue-500 text-white px-6 py-3 rounded">
Modifier
</button>

</form>

</div>

</div>

<?php include '../includes/footer.php'; ?>