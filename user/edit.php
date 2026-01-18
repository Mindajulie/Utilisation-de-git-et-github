<?php
require "../includes/auth.php";
require "../includes/admin.php";
require "../includes/config.php";

$id = (int)($_GET["id"] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $role = $_POST["role"];

    $pdo->prepare("
        UPDATE users 
        SET nom = ?, prenom = ?, role = ?
        WHERE id = ?
    ")->execute([$nom, $prenom, $role, $id]);

    header("Location: index.php");
    exit;
}
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <h3 class="mb-4">✏️ Modifier utilisateur</h3>

    <div class="card p-4 col-md-6 mx-auto">
        <form method="POST">

            <input class="form-control mb-3" name="nom"
                   value="<?= htmlspecialchars($user["nom"]) ?>" required>

            <input class="form-control mb-3" name="prenom"
                   value="<?= htmlspecialchars($user["prenom"]) ?>" required>

            <select class="form-control mb-3" name="role">
                <option value="user" <?= $user["role"] === "user" ? "selected" : "" ?>>Utilisateur</option>
                <option value="admin" <?= $user["role"] === "admin" ? "selected" : "" ?>>Admin</option>
            </select>

            <button class="btn btn-futur w-100">Enregistrer</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
