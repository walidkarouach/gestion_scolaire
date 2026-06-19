<?php

include '../config/config.php';
include '../includes/header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM classe
WHERE id_classe=?
");

$stmt->execute([$id]);

$classe = $stmt->fetch();

if(isset($_POST['modifier'])){

    $stmt = $pdo->prepare("
    UPDATE classe
    SET nom_classe=?,
        niveau=?
    WHERE id_classe=?
    ");

    $stmt->execute([
        $_POST['nom_classe'],
        $_POST['niveau'],
        $id
    ]);

    header("Location:index.php");
    exit;
}

?>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white shadow-lg rounded-xl p-8">

<h1 class="text-3xl font-bold text-center text-blue-600 mb-6">
Modifier Classe
</h1>

<form method="POST">

<input
type="text"
name="nom_classe"
value="<?= $classe['nom_classe'] ?>"
class="w-full border rounded-lg p-3 mb-4"
required>

<input
type="text"
name="niveau"
value="<?= $classe['niveau'] ?>"
class="w-full border rounded-lg p-3 mb-6"
required>

<button
name="modifier"
class="bg-blue-500 text-white px-6 py-3 rounded-lg">
Modifier
</button>

</form>

</div>

</div>

<?php include '../includes/footer.php'; ?>