<?php
include "includes/config.php";
include "includes/secur.php";

// Si déjà connecté, rediriger vers dashboard
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérification CSRF
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("CSRF détecté !");
    }

    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérifier si email existe
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $error = "Cet email est déjà utilisé";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (nom,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$nom,$email,$password,'user']);
        header("Location: login.php?success=1");
        exit;
    }
}
?>

<?php include "includes/head.php"; ?>
<div class="container mt-5">
    <h2 class="mb-4">Créer un compte utilisateur</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="post">
        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-future">S'inscrire</button>
    </form>

    <p class="mt-2">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</div>
<?php include "includes/footer.php"; ?>