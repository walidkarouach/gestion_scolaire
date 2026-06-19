<?php

include '../config/config.php';
include '../includes/header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM matiere
WHERE id_matiere = ?
");

$stmt->execute([$id]);

$matiere = $stmt->fetch();

if(isset($_POST['modifier'])){

    $nom_matiere = $_POST['nom_matiere'];

    $sql = "
    UPDATE matiere
    SET nom_matiere=?
    WHERE id_matiere=?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nom_matiere,
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">

<h2 class="text-2xl font-bold mb-4">
Modifier Matière
</h2>

<form method="POST">

<label class="block mb-2">
Nom Matière
</label>

<input
type="text"
name="nom_matiere"
value="<?= $matiere['nom_matiere'] ?>"
class="w-full border p-2 rounded mb-4"
required
>

<button
type="submit"
name="modifier"
class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
>
Modifier
</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>