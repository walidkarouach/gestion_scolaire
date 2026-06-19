<?php

include '../config/config.php';
include '../includes/header.php';

$affectations = $pdo->query("
SELECT
a.*,
e.nom,
e.prenom,
m.nom_matiere,
c.nom_classe
FROM affectation a
JOIN enseignant e ON a.id_enseignant = e.id_enseignant
JOIN matiere m ON a.id_matiere = m.id_matiere
JOIN classe c ON a.id_classe = c.id_classe
");

?>

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">
Gestion des Affectations
</h1>

<a href="ajouter.php"
class="bg-green-500 text-white px-4 py-2 rounded">
Ajouter Affectation
</a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

<table class="w-full">

<thead class="bg-red-500 text-white">

<tr>
<th class="p-3">Classe</th>
<th class="p-3">Enseignant</th>
<th class="p-3">Matière</th>
<th class="p-3">Actions</th>
</tr>

</thead>

<tbody>

<?php foreach($affectations as $a): ?>

<tr class="border-b hover:bg-gray-100">

<td class="p-3">
<?= $a['nom_classe'] ?>
</td>

<td class="p-3">
<?= $a['nom'] ?> <?= $a['prenom'] ?>
</td>

<td class="p-3">
<?= $a['nom_matiere'] ?>
</td>

<td class="p-3">

<a
href="supprimer.php?id_classe=<?= $a['id_classe'] ?>&id_enseignant=<?= $a['id_enseignant'] ?>&id_matiere=<?= $a['id_matiere'] ?>"
class="bg-red-500 text-white px-3 py-1 rounded"
onclick="return confirm('Supprimer cette affectation ?')"
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