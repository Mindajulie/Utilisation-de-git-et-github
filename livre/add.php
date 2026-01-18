<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        INSERT INTO livre (titre, auteur, dateEdition)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([
        $_POST["titre"],
        $_POST["auteur"],
        $_POST["dateEdition"]
    ]);

    header("Location: index.php");
    exit;
}
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width:600px">
        <h4>➕ Ajouter un livre</h4>

        <form method="post">
            <input class="form-control mb-3" name="titre" placeholder="Titre" required>
            <input class="form-control mb-3" name="auteur" placeholder="Auteur" required>
            <input class="form-control mb-3" type="date" name="dateEdition">

            <button class="btn btn-info w-100">Enregistrer</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
