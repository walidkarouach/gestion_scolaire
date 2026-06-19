<?php

include '../config/config.php';
include '../includes/header.php';

if(isset($_POST['ajouter'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "
    INSERT INTO enseignant(nom, prenom, email, telephone)
    VALUES(?, ?, ?, ?)
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nom,
        $prenom,
        $email,
        $telephone
    ]);

    header("Location: index.php");
    exit;
}
?>

<div class="max-w-xl mx-auto mt-10">

    <div class="bg-white shadow-lg rounded-xl p-8">

        <h1 class="text-3xl font-bold text-center text-purple-600 mb-6">
            Ajouter un Enseignant
        </h1>

        <form method="POST">

            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Nom
                </label>

                <input
                    type="text"
                    name="nom"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Prénom
                </label>

                <input
                    type="text"
                    name="prenom"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">
                    Téléphone
                </label>

                <input
                    type="text"
                    name="telephone"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    name="ajouter"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg"
                >
                    Ajouter
                </button>

                <a
                    href="index.php"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg"
                >
                    Retour
                </a>

            </div>

        </form>

    </div>

</div>

<?php include '../includes/footer.php'; ?>