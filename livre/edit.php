<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

$id = $_GET["id"] ?? null;

$stmt = $pdo->prepare("SELECT * FROM livre WHERE id = ?");
$stmt->execute([$id]);
$l = $stmt->fetch();

if (!$l) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        UPDATE livre
        SET titre=?, auteur=?, dateEdition=?
        WHERE id=?
    ");
    $stmt->execute([
        $_POST["titre"],
        $_POST["auteur"],
        $_POST["dateEdition"],
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
        <h4>✏️ Modifier livre</h4>

        <form method="post">
            <input class="form-control mb-3" name="titre" value="<?= htmlspecialchars($l["titre"]) ?>" required>
            <input class="form-control mb-3" name="auteur" value="<?= htmlspecialchars($l["auteur"]) ?>" required>
            <input class="form-control mb-3" type="date" name="dateEdition" value="<?= $l["dateEdition"] ?>">

            <button class="btn btn-warning w-100">Mettre à jour</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
