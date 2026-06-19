<?php

include '../config/config.php';
include '../includes/header.php';

$enseignants = $pdo->query("
SELECT * FROM enseignant
");

?>

<div class="max-w-6xl mx-auto">

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">
Gestion des Enseignants
</h1>

<a href="ajouter.php"
class="bg-green-500 text-white px-4 py-2 rounded">
Ajouter Enseignant
</a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

<table class="w-full">

<thead class="bg-purple-500 text-white">

<tr>
<th class="p-3">ID</th>
<th class="p-3">Nom</th>
<th class="p-3">Prénom</th>
<th class="p-3">Email</th>
<th class="p-3">Téléphone</th>
<th class="p-3">Actions</th>
</tr>

</thead>

<tbody>

<?php foreach($enseignants as $e): ?>

<tr class="border-b hover:bg-gray-100">

<td class="p-3">
<?= $e['id_enseignant'] ?>
</td>

<td class="p-3">
<?= $e['nom'] ?>
</td>

<td class="p-3">
<?= $e['prenom'] ?>
</td>

<td class="p-3">
<?= $e['email'] ?>
</td>

<td class="p-3">
<?= $e['telephone'] ?>
</td>

<td class="p-3">

<a
href="modifier.php?id=<?= $e['id_enseignant'] ?>"
class="bg-blue-500 text-white px-3 py-1 rounded"
>
Modifier
</a>

<a
href="supprimer.php?id=<?= $e['id_enseignant'] ?>"
class="bg-red-500 text-white px-3 py-1 rounded ml-2"
onclick="return confirm('Supprimer cet enseignant ?')"
>
Supprimer
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

<?php include '../includes/footer.php'; ?>