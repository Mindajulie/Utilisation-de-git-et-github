<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        INSERT INTO etudiant (nom, prenom, classe, adresse)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->execute([
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["classe"],
        $_POST["adresse"]
    ]);

    header("Location: index.php");
    exit;
}
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width:600px">
        <h4 class="mb-3">➕ Ajouter un étudiant</h4>

        <form method="post">
            <input class="form-control mb-3" name="nom" placeholder="Nom" required>
            <input class="form-control mb-3" name="prenom" placeholder="Prénom" required>
            <input class="form-control mb-3" name="classe" placeholder="Classe">
            <input class="form-control mb-3" name="adresse" placeholder="Adresse">

            <button class="btn btn-info w-100">Enregistrer</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
