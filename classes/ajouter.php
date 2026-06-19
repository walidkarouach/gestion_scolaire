<?php

include '../config/config.php';
include '../includes/header.php';

if(isset($_POST['ajouter'])){

    $nom_classe = $_POST['nom_classe'];
    $niveau = $_POST['niveau'];

    $stmt = $pdo->prepare("
    INSERT INTO classe(nom_classe,niveau)
    VALUES(?,?)
    ");

    $stmt->execute([
        $nom_classe,
        $niveau
    ]);

    header("Location:index.php");
    exit;
}

?>

<div class="max-w-xl mx-auto mt-10">

    <div class="bg-white shadow-lg rounded-xl p-8">

        <h1 class="text-3xl font-bold text-center text-green-600 mb-6">
            Ajouter une Classe
        </h1>

        <form method="POST">

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nom Classe
                </label>

                <input
                type="text"
                name="nom_classe"
                required
                class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Niveau
                </label>

                <input
                type="text"
                name="niveau"
                required
                class="w-full border rounded-lg p-3">

            </div>

            <div class="flex gap-3">

                <button
                type="submit"
                name="ajouter"
                class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg">
                    Ajouter
                </button>

                <a
                href="index.php"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">
                    Retour
                </a>

            </div>

        </form>

    </div>

</div>

<?php include '../includes/footer.php'; ?>