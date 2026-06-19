<?php

include '../config/config.php';
include '../includes/header.php';

$classes = $pdo->query("SELECT * FROM classe");

if(isset($_POST['ajouter'])){

$stmt = $pdo->prepare("
INSERT INTO eleve
(nom,prenom,date_naissance,adresse,telephone,id_classe)
VALUES (?,?,?,?,?,?)
");

$stmt->execute([
$_POST['nom'],
$_POST['prenom'],
$_POST['date_naissance'],
$_POST['adresse'],
$_POST['telephone'],
$_POST['id_classe']
]);

header("Location:index.php");
exit;
}
?>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white shadow-lg rounded-xl p-8">

<h1 class="text-3xl font-bold text-center text-blue-600 mb-6">
Ajouter Élève
</h1>

<form method="POST">

<input
type="text"
name="nom"
placeholder="Nom"
class="w-full border rounded p-3 mb-4"
required>

<input
type="text"
name="prenom"
placeholder="Prénom"
class="w-full border rounded p-3 mb-4"
required>

<input
type="date"
name="date_naissance"
class="w-full border rounded p-3 mb-4"
required>

<input
type="text"
name="adresse"
placeholder="Adresse"
class="w-full border rounded p-3 mb-4"
required>

<input
type="text"
name="telephone"
placeholder="Téléphone"
class="w-full border rounded p-3 mb-4"
required>

<select
name="id_classe"
class="w-full border rounded p-3 mb-6"
required>

<option value="">
Choisir une classe
</option>

<?php foreach($classes as $classe): ?>

<option value="<?= $classe['id_classe'] ?>">
<?= $classe['nom_classe'] ?>
</option>

<?php endforeach; ?>

</select>

<button
name="ajouter"
class="bg-blue-500 text-white px-6 py-3 rounded">
Ajouter
</button>

</form>

</div>

</div>

<?php include '../includes/footer.php'; ?>