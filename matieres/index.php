<?php

include '../config/config.php';
include '../includes/header.php';

$matieres = $pdo->query("
SELECT * FROM matiere
");
?>

<div class="max-w-6xl mx-auto">

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">
Gestion des Matières
</h1>

<a href="ajouter.php"
class="bg-green-500 text-white px-4 py-2 rounded">
Ajouter Matière
</a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

<table class="w-full">

<thead class="bg-orange-500 text-white">

<tr>
<th class="p-3">ID</th>
<th class="p-3">Nom Matière</th>
<th class="p-3">Actions</th>
</tr>

</thead>

<tbody>

<?php foreach($matieres as $m): ?>

<tr class="border-b">

<td class="p-3">
<?= $m['id_matiere'] ?>
</td>

<td class="p-3">
<?= $m['nom_matiere'] ?>
</td>

<td class="p-3">

<a
href="modifier.php?id=<?= $m['id_matiere'] ?>"
class="bg-blue-500 text-white px-3 py-1 rounded"
>
Modifier
</a>

<a
href="supprimer.php?id=<?= $m['id_matiere'] ?>"
class="bg-red-500 text-white px-3 py-1 rounded ml-2"
onclick="return confirm('Supprimer cette matière ?')"
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