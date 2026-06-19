<?php

include '../config/config.php';
include '../includes/header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM enseignant
WHERE id_enseignant = ?
");

$stmt->execute([$id]);

$enseignant = $stmt->fetch();

if(isset($_POST['modifier'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "
    UPDATE enseignant
    SET nom=?,
        prenom=?,
        email=?,
        telephone=?
    WHERE id_enseignant=?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nom,
        $prenom,
        $email,
        $telephone,
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">

<h2 class="text-2xl font-bold mb-4">
Modifier Enseignant
</h2>

<form method="POST">

<input
type="text"
name="nom"
value="<?= $enseignant['nom'] ?>"
class="w-full border p-2 mb-3"
required
>

<input
type="text"
name="prenom"
value="<?= $enseignant['prenom'] ?>"
class="w-full border p-2 mb-3"
required
>

<input
type="email"
name="email"
value="<?= $enseignant['email'] ?>"
class="w-full border p-2 mb-3"
required
>

<input
type="text"
name="telephone"
value="<?= $enseignant['telephone'] ?>"
class="w-full border p-2 mb-3"
required
>

<button
name="modifier"
class="bg-blue-500 text-white px-4 py-2 rounded"
>
Modifier
</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>