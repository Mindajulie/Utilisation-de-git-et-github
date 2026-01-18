<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

$id = $_GET["id"] ?? null;

$stmt = $pdo->prepare("SELECT * FROM etudiant WHERE id = ?");
$stmt->execute([$id]);
$e = $stmt->fetch();

if (!$e) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        UPDATE etudiant
        SET nom=?, prenom=?, classe=?, adresse=?
        WHERE id=?
    ");
    $stmt->execute([
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["classe"],
        $_POST["adresse"],
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width:600px">
        <h4 class="mb-3">✏️ Modifier étudiant</h4>

        <form method="post">
            <input class="form-control mb-3" name="nom" value="<?= htmlspecialchars($e["nom"]) ?>" required>
            <input class="form-control mb-3" name="prenom" value="<?= htmlspecialchars($e["prenom"]) ?>" required>
            <input class="form-control mb-3" name="classe" value="<?= htmlspecialchars($e["classe"]) ?>">
            <input class="form-control mb-3" name="adresse" value="<?= htmlspecialchars($e["adresse"]) ?>">

            <button class="btn btn-warning w-100">Mettre à jour</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
