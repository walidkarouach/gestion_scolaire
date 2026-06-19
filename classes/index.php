<?php

include '../config/config.php';
include '../includes/header.php';

$classes = $pdo->query("SELECT * FROM classe");

?>

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Gestion des Classes
        </h1>

        <a href="ajouter.php"
        class="bg-green-500 text-white px-4 py-2 rounded">
            Ajouter Classe
        </a>

    </div>

    <div class="bg-white shadow rounded overflow-hidden">

        <table class="w-full">

            <thead class="bg-green-500 text-white">

                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Nom Classe</th>
                    <th class="p-3">Niveau</th>
                    <th class="p-3">Actions</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach($classes as $c): ?>

                <tr class="border-b hover:bg-gray-100">

                    <td class="p-3">
                        <?= $c['id_classe'] ?>
                    </td>

                    <td class="p-3">
                        <?= $c['nom_classe'] ?>
                    </td>

                    <td class="p-3">
                        <?= $c['niveau'] ?>
                    </td>

                    <td class="p-3">

                        <a
                        href="modifier.php?id=<?= $c['id_classe'] ?>"
                        class="bg-blue-500 text-white px-3 py-1 rounded">
                            Modifier
                        </a>

                        <a
                        href="supprimer.php?id=<?= $c['id_classe'] ?>"
                        class="bg-red-500 text-white px-3 py-1 rounded ml-2"
                        onclick="return confirm('Supprimer cette classe ?')">
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