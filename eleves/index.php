<?php

include '../config/config.php';
include '../includes/header.php';

$eleves = $pdo->query("
SELECT e.*, c.nom_classe
FROM eleve e
JOIN classe c ON e.id_classe = c.id_classe
");

?>

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">
Gestion des Élèves
</h1>

<a href="ajouter.php"
class="bg-green-500 text-white px-4 py-2 rounded">
Ajouter Élève
</a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

<table class="w-full">

<thead class="bg-blue-500 text-white">

<tr>
<th class="p-3">ID</th>
<th class="p-3">Nom</th>
<th class="p-3">Prénom</th>
<th class="p-3">Date Naissance</th>
<th class="p-3">Adresse</th>
<th class="p-3">Téléphone</th>
<th class="p-3">Classe</th>
<th class="p-3">Actions</th>
</tr>

</thead>

<tbody>

<?php foreach($eleves as $e): ?>

<tr class="border-b hover:bg-gray-100">

<td class="p-3"><?= $e['id_eleve'] ?></td>
<td class="p-3"><?= $e['nom'] ?></td>
<td class="p-3"><?= $e['prenom'] ?></td>
<td class="p-3"><?= $e['date_naissance'] ?></td>
<td class="p-3"><?= $e['adresse'] ?></td>
<td class="p-3"><?= $e['telephone'] ?></td>
<td class="p-3"><?= $e['nom_classe'] ?></td>

<td class="p-3">

<a
href="modifier.php?id=<?= $e['id_eleve'] ?>"
class="bg-blue-500 text-white px-3 py-1 rounded">
Modifier
</a>

<a
href="supprimer.php?id=<?= $e['id_eleve'] ?>"
class="bg-red-500 text-white px-3 py-1 rounded ml-2"
onclick="return confirm('Supprimer cet élève ?')">
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